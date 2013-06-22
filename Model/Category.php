<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\Category as BaseCategory;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Category extends BaseCategory
{
    public function __construct()
    {
        $this->active = false;
        $this->events = new ArrayCollection;
    }

    public function __toString()
    {
        return $this->name ? : '';
    }

    public function equals(Category $other)
    {
        return $this->id = $other->getId();
    }
}
