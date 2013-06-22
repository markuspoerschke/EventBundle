<?php

namespace Eluceo\EventBundle\Model;

use Eluceo\EventBundle\Model\Base\GalleryPicture as BaseGalleryPicture;

abstract class GalleryPicture extends BaseGalleryPicture
{
    public function __construct()
    {
        $this->clicks = 0;
        $this->views  = 0;
    }
}
