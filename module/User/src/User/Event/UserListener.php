<?php


namespace User\Event;


use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;

class UserListener implements ListenerAggregateInterface {
    use ListenerAggregateTrait;

    /**
     * Attach one or more listeners
     *
     * Implementors may add an optional $priority argument; the EventManager
     * implementation will pass this to the aggregate.
     *
     * @param EventManagerInterface $events
     *
     * @return void
     */
    public function attach(EventManagerInterface $events) {
        $sharedEvents = $events->getSharedManager();
        $this->listeners[] = $sharedEvents->attach(
            'ZF\Apigility\Doctrine\DoctrineResource',
            DoctrineResourceEvent::EVENT_CREATE_PRE,
            array($this, 'onPreCreateEvent')
        );
    }

    public function onPreCreateEvent(DoctrineResourceEvent $e) {
        $entity = $e->getEntity();

        $entity->changePassword('Welcome123');
    }
}