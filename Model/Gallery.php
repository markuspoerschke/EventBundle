<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\Gallery as BaseGallery;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Gallery extends BaseGallery
{
    function __construct()
    {
        $this->uniqueSlug = uniqid('gallery');
        $this->pictures   = new ArrayCollection;
    }
}