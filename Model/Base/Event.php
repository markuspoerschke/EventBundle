<?php

namespace Eluceo\EventBundle\Model\Base;

abstract class Event
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $name2;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $shortDescription;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $categories;

    /**
     * @var \Eluceo\EventBundle\Model\Location
     */
    protected $location;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var string
     */
    protected $uniqueSlug;

    /**
     * @var \Sonata\MediaBundle\Model\Media
     */
    protected $image;

    /**
     * @var \Eluceo\EventBundle\Model\Gallery
     */
    protected $gallery;

    /**
     * @var \Eluceo\EventBundle\Model\EventDate
     */
    protected $eventDates;

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

    /**
     * @param $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $gallery
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * @return \Eluceo\EventBundle\Model\Gallery
     */
    public function getGallery()
    {
        return $this->gallery;
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
     * @param $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return \Sonata\MediaBundle\Model\Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return \Eluceo\EventBundle\Model\Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name2
     */
    public function setName2($name2)
    {
        $this->name2 = $name2;
    }

    /**
     * @return string
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * @param $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param $uniqueSlug
     */
    public function setUniqueSlug($uniqueSlug)
    {
        $this->uniqueSlug = $uniqueSlug;
    }

    /**
     * @return string
     */
    public function getUniqueSlug()
    {
        return $this->uniqueSlug;
    }

    /**
     * @param $eventDates
     */
    public function setEventDates($eventDates)
    {
        $this->eventDates = $eventDates;
    }

    /**
     * @return \Eluceo\EventBundle\Model\EventDate
     */
    public function getEventDates()
    {
        return $this->eventDates;
    }
}