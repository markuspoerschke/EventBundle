<?php

namespace Eluceo\EventBundle\Routing;

use Symfony\Component\Routing\RouterInterface;

use Eluceo\EventBundle\Model\Event;
use Eluceo\EventBundle\Model\EventDate;
use Eluceo\EventBundle\Model\Category;

class UrlGenerator implements UrlGeneratorInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    protected $router;

    function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function eventUrl(Event $event, $params = array(), $absolute = false)
    {
        $slug = $event->getUniqueSlug();

        $params['slug'] = $slug;

        return $this->router->generate(
            'eluceo.event.index',
            $params,
            $absolute
        );
    }

    public function categoryUrl(Category $category, $params = array(), $absolute = false)
    {
        $slug = $category->getUniqueSlug();

        $params['categorySlug'] = $slug;

        return $this->router->generate(
            'eluceo.event.category.index',
            $params,
            $absolute
        );
    }

    public function eventDateUrl(EventDate $eventDate, $params = array(), $absolute = false)
    {
        $slug                  = $eventDate->getEvent()->getUniqueSlug();
        $params['uniqueSlug']  = $slug;
        $params['eventDateId'] = $eventDate->getId();

        return $this->router->generate(
            'eluceo.event_date.show',
            $params,
            $absolute
        );
    }
}