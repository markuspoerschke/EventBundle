<?php

namespace Eluceo\EventBundle\Model\Base;

abstract class Event
{
    protected $id;

    protected $name;

    protected $name2;

    protected $description;

    protected $shortDescription;

    protected $categories;

    protected $location;

    protected $active;

    protected $uniqueSlug;

    protected $image;

    protected $gallery;

    protected $eventDates;

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setGallery($gallery)
    {
        $this->gallery = $gallery;
    }

    public function getGallery()
    {
        return $this->gallery;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName2($name2)
    {
        $this->name2 = $name2;
    }

    public function getName2()
    {
        return $this->name2;
    }

    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function setUniqueSlug($uniqueSlug)
    {
        $this->uniqueSlug = $uniqueSlug;
    }

    public function getUniqueSlug()
    {
        return $this->uniqueSlug;
    }

    public function setEventDates($eventDates)
    {
        $this->eventDates = $eventDates;
    }

    public function getEventDates()
    {
        return $this->eventDates;
    }
}