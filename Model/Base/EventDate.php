<?php

namespace Eluceo\EventBundle\Model\Base;

abstract class EventDate
{
    protected $id;

    protected $event;

    protected $startDatetime;

    protected $endDatetime;

    protected $noTime;

    public function setEndDatetime($endDatetime)
    {
        $this->endDatetime = $endDatetime;
    }

    public function getEndDatetime()
    {
        return $this->endDatetime;
    }

    public function setEvent($event)
    {
        $this->event = $event;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNoTime($noTime)
    {
        $this->noTime = $noTime;
    }

    public function getNoTime()
    {
        return $this->noTime;
    }

    public function setStartDatetime($startDatetime)
    {
        $this->startDatetime = $startDatetime;
    }

    public function getStartDatetime()
    {
        return $this->startDatetime;
    }
}