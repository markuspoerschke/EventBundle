<?php

namespace Eluceo\EventBundle\Model\Base;

abstract class EventDate
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var \Eluceo\EventBundle\Model\Event
     */
    protected $event;

    /**
     * @var \DateTime
     */
    protected $startDatetime;

    /**
     * @var \DateTime
     */
    protected $endDatetime;

    /**
     * @var boolean
     */
    protected $noTime;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @param $endDatetime
     */
    public function setEndDatetime($endDatetime)
    {
        $this->endDatetime = $endDatetime;
    }

    /**
     * @return \DateTime
     */
    public function getEndDatetime()
    {
        return $this->endDatetime;
    }

    /**
     * @param $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return \Eluceo\EventBundle\Model\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $noTime
     */
    public function setNoTime($noTime)
    {
        $this->noTime = $noTime;
    }

    /**
     * @return boolean
     */
    public function getNoTime()
    {
        return $this->noTime;
    }

    /**
     * @param $startDatetime
     */
    public function setStartDatetime($startDatetime)
    {
        $this->startDatetime = $startDatetime;
    }

    /**
     * @return \DateTime
     */
    public function getStartDatetime()
    {
        return $this->startDatetime;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }
}
