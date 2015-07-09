<?php


namespace Core\Hydrator\Filter;

use Zend\Stdlib\Hydrator\Filter\FilterComposite;

class PropertyFilterComposite extends FilterComposite {
    /**
     * @var string
     */
    protected $property;

    /**
     * @param string $property
     */
    public function __construct($property) {
        $this->property = $property;

        parent::__construct();
    }

    /**
     * Executed composite filters if property matches
     *
     * @param string $property The name of the property
     * @return bool
     */
    public function filter($property) {
        if($property == $this->property) {
            return parent::filter($property);
        }

        return true;
    }
}