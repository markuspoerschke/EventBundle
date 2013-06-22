<?php

namespace Eluceo\EventBundle\Model\Base;

abstract class Gallery
{
    protected $id;

    protected $name;

    protected $uniqueSlug;

    protected $pictures;

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

    public function setPictures($pictures)
    {
        $this->pictures = $pictures;
    }

    public function getPictures()
    {
        return $this->pictures;
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
