<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\Location as BaseLocation;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Location extends BaseLocation
{
    function __construct()
    {
        $this->uniqueSlug = uniqid('location');
        $this->events     = new ArrayCollection;
    }
}