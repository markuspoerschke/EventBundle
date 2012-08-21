<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\Event as BaseEvent;
use Doctrine\Common\Collections\ArrayCollection;

class Event extends BaseEvent
{
    function __construct()
    {
        $this->active     = false;
        $this->uniqueSlug = uniqid('event');
        $this->categories = new ArrayCollection;
        $this->image      = null;
    }
}