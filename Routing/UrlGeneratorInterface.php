<?php

namespace Eluceo\EventBundle\Routing;

use Eluceo\EventBundle\Model\Event;
use Eluceo\EventBundle\Model\EventDate;
use Eluceo\EventBundle\Model\Category;
use Eluceo\EventBundle\Model\Location;

interface UrlGeneratorInterface
{
    /**
     * Generates an URL or a path for the given Category
     *
     * @abstract
     * @param  Event  $event    The Event
     * @param  array  $params   Additional parameters
     * @param  bool   $absolute If true an URL else a path will be returned
     * @return string
     */
    public function eventUrl(Event $event, $params = array(), $absolute = false);

    /**
     * Generates an URL or a path for the given Category
     *
     * @abstract
     * @param  Category $category The Category
     * @param  array    $params   Additional parameters
     * @param  bool     $absolute If true an URL else a path will be returned
     * @return string
     */
    public function categoryUrl(Category $category, $params = array(), $absolute = false);

    /**
     * Generates an URL or a path for the given EventDate
     *
     * @abstract
     * @param  EventDate $eventDate The EventDate
     * @param  array     $params    Additional parameters
     * @param  bool      $absolute  If true an URL else a path will be returned
     * @return string
     */
    public function eventDateUrl(EventDate $eventDate, $params = array(), $absolute = false);

    /**
     * Generates an URL or a path for the given Location
     *
     * @abstract
     * @param  Location $location
     * @param  array    $params
     * @param  bool     $absolute
     * @return mixed
     */
    public function locationUrl(Location $location, $params = array(), $absolute = false);
}
