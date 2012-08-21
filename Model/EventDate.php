<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\EventDate as BaseEventDate;

abstract class EventDate extends BaseEventDate
{
    function __construct()
    {
        $this->noTime = false;
    }
}