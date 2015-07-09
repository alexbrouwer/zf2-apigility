<?php


namespace Core\Hydrator\Filter;

use Zend\Stdlib\Hydrator\Filter\FilterInterface;

class AlwaysFilter implements FilterInterface {

    /**
     * Always filters
     *
     * @param string $property The name of the property
     * @return bool
     */
    public function filter($property) {
        return false;
    }
}