<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\Location as BaseLocation;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Location extends BaseLocation
{
    function __construct()
    {
        $this->events = new ArrayCollection;
    }

    function __toString()
    {
        return $this->getName();
    }

    function equals(Location $other)
    {
        return $this->id == $other->getId();
    }
}