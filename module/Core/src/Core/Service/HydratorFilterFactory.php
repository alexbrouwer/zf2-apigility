<?php


namespace Core\Service;

use Core\Hydrator\Filter\AlwaysFilter;
use Core\Hydrator\Filter\PropertyFilterComposite;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Exception\InvalidCallbackException;
use Zend\Stdlib\Hydrator\Filter\FilterComposite;
use Zend\Stdlib\Hydrator\Filter\FilterInterface;

class HydratorFilterFactory implements AbstractFactoryInterface
{
    const FACTORY_NAMESPACE = 'hydrator-filters';

    /**
     * Cache of canCreateServiceWithName lookups
     * @var array
     */
    protected $lookupCache = array();

    /**
     * Determine if we can create a service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        if (array_key_exists($requestedName, $this->lookupCache)) {
            return $this->lookupCache[$requestedName];
        }

        if (!$serviceLocator->has('Config')) {
            return false;
        }

        $config = $serviceLocator->get('Config');
        $namespace = self::FACTORY_NAMESPACE;
        if (!isset($config[$namespace]) || !is_array($config[$namespace]) || !isset($config[$namespace][$requestedName])) {
            $this->lookupCache[$requestedName] = false;

            return false;
        }

        $this->lookupCache[$requestedName] = true;

        return true;
    }

    /**
     * Create service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return mixed
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        $config   = $serviceLocator->get('Config');
        $config   = $config[self::FACTORY_NAMESPACE][$requestedName];

        $filterCollection = new FilterComposite();

        $conditionMap = array(
            'and' => FilterComposite::CONDITION_AND,
            'or'  => FilterComposite::CONDITION_OR,
        );

        foreach($config as $property => $filters) {
            $propertyFilter = new PropertyFilterComposite($property);
            foreach($filters as $filterKey => $filterConfig) {
                $condition = isset($filterConfig['condition']) ?
                    $conditionMap[$filterConfig['condition']] :
                    FilterComposite::CONDITION_OR;

                $filterService = $filterConfig['filter'];
                if (!$serviceLocator->has($filterService)) {
                    throw new ServiceNotCreatedException(
                        sprintf('Invalid filter %s for field %s: service does not exist', $filterService, $name)
                    );
                }

                $filterService = $serviceLocator->get($filterService);
                if (!$filterService instanceof FilterInterface) {
                    throw new InvalidCallbackException(
                        sprintf('Filter service %s must implement FilterInterface'), get_class($filterService)
                    );
                }

                $propertyFilter->addFilter($filterKey, $filterService, $condition);
            }

            $filterCollection->addFilter($property, $propertyFilter);
        }

        return $filterCollection;
    }
}