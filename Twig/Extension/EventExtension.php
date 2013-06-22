<?php

namespace Eluceo\EventBundle\Twig\Extension;

use Eluceo\EventBundle\Routing\UrlGeneratorInterface;
use Eluceo\EventBundle\Model\Event;
use Eluceo\EventBundle\Model\EventDate;
use Eluceo\EventBundle\Model\Category;

class EventExtension extends \Twig_Extension
{
    /**
     * @var \Eluceo\EventBundle\Routing\UrlGeneratorInterface
     */
    protected $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function getName()
    {
        return 'eluceo_event';
    }

    public function getFunctions()
    {
        return array(
            'event_date_url'     => new \Twig_Function_Method($this, 'eventDateUrl'),
            'event_category_url' => new \Twig_Function_Method($this, 'categoryUrl'),
            'event_url'          => new \Twig_Function_Method($this, 'eventUrl')
        );
    }

    /**
     * Wrapper for UrlGenerator service method
     *
     * @param  EventDate $eventDate
     * @param  array     $params
     * @param  bool      $absolute
     * @return string
     */
    public function eventDateUrl(EventDate $eventDate, $params = array(), $absolute = false)
    {
        return $this->urlGenerator->eventDateUrl($eventDate, $params, $absolute);
    }

    /**
     * Wrapper for UrlGenerator service method
     *
     * @param  Category $category
     * @param  array    $params
     * @param  bool     $absolute
     * @return string
     */
    public function categoryUrl(Category $category, $params = array(), $absolute = false)
    {
        return $this->urlGenerator->categoryUrl($category, $params, $absolute);
    }

    /**
     * Wrapper for UrlGenerator service method
     *
     * @param  Event  $event
     * @param  array  $params
     * @param  bool   $absolute
     * @return string
     */
    public function eventUrl(Event $event, $params = array(), $absolute = false)
    {
        return $this->urlGenerator->eventUrl($event, $params, $absolute);
    }
}
