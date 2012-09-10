<?php

namespace Eluceo\EventBundle\Export;

abstract class AbstractExport
{
    protected $items;

    function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Renders the output of the current export
     *
     * @abstract
     * @return string
     */
    abstract function render();
}