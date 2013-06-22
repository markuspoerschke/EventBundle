<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\Location as BaseLocation;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Location extends BaseLocation
{
    public function __construct()
    {
        $this->events = new ArrayCollection;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function equals(Location $other)
    {
        return $this->id == $other->getId();
    }
}
