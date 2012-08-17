<?php

namespace Eluceo\EventBundle\Model\Base;

abstract class Event
{
    protected $id;

    protected $name;

    protected $name2;

    protected $description;

    protected $short_description;

    protected $start_datetime;

    protected $end_datetime;

    protected $no_time;

    protected $categories;

    protected $location;

    protected $active = true;

    protected $slug;

    protected $image = null;

    protected $gallery = null;
}