<?php

namespace Eluceo\EventBundle\Twig\Extension;

use Eluceo\EventBundle\Routing\UrlGeneratorInterface;

class EventExtension extends \Twig_Extension
{
    /**
     * @var \Eluceo\EventBundle\Routing\UrlGeneratorInterface
     */
    protected $urlGenerator;

    function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    function getName()
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

    public function eventDateUrl($ed, $params = array(), $absolute = false)
    {
        return $this->urlGenerator->eventDateUrl($ed, $params, $absolute);
    }

    public function categoryUrl($category, $params = array(), $absolute = false)
    {
        return $this->urlGenerator->categoryUrl($category, $params, $absolute);
    }

    public function eventUrl($event, $params = array(), $absolute = false)
    {
        return $this->urlGenerator->eventUrl($event, $params, $absolute);
    }
}