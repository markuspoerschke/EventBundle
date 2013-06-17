<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\EventDate as BaseEventDate;

abstract class EventDate extends BaseEventDate
{
    function __construct()
    {
        $this->noTime = false;
        $this->active = false;
    }

    function __toString()
    {
        $format = $this->noTime ? 'd.m.Y' : 'd.m.Y H:i';
        return $this->startDatetime->format($format);
    }
}