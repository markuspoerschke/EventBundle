<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\Event as BaseEvent;
use Doctrine\Common\Collections\ArrayCollection;

class Event extends BaseEvent
{
    function __construct()
    {
        $this->active = false;
        $this->categories = new ArrayCollection;
        $this->image = null;
        $this->eventDates = new ArrayCollection;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function addEventDate(EventDate $eventDate)
    {
        $this->eventDates[] = $eventDate;
        $eventDate->setEvent($this);
    }

    public function removeEventDate(EventDate $eventDate)
    {
        foreach ($this->eventDates as $key => $item) {
            if ($eventDate->equals($item)) {
                unset($this->eventDates[$key]);
                return true;
            }
        }

        return false;
    }

    function equals(Event $other)
    {
        return $this->id == $other->getId();
    }
}