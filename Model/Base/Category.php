<?php

namespace Eluceo\EventBundle\Model\Base;

abstract class Category
{
    protected $id;

    protected $name;

    protected $active;

    protected $events;

    protected $uniqueSlug;

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setEvents($events)
    {
        $this->events = $events;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setUniqueSlug($uniqueSlug)
    {
        $this->uniqueSlug = $uniqueSlug;
    }

    public function getUniqueSlug()
    {
        return $this->uniqueSlug;
    }
}
