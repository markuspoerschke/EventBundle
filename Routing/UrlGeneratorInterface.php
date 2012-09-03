<?php

namespace Eluceo\EventBundle\Routing;

use Eluceo\EventBundle\Model\Event;
use Eluceo\EventBundle\Model\EventDate;
use Eluceo\EventBundle\Model\Category;

interface UrlGeneratorInterface
{
    public function eventUrl(Event $event, $params = array(), $absolute = false);

    public function categoryUrl(Category $category, $params = array(), $absolute = false);

    public function eventDateUrl(EventDate $eventDate, $params = array(), $absolute = false);
}