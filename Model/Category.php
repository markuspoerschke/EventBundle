<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\Category as BaseCategory;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Category extends BaseCategory
{
    function __construct()
    {
        $this->active = false;
        $this->events = new ArrayCollection;
    }

    function __toString()
    {
        return $this->name;
    }

    function equals(Category $other)
    {
        return $this->id = $other->getId();
    }
}