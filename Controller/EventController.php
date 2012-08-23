<?php

namespace Eluceo\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EventController extends Controller
{
    /**
     * Finds an Event by the given values from Request.
     *
     * Request must contain id or uniqueSlug
     *
     * @return \Eluceo\EventBundle\Model\Event
     * @throws \Exception
     */
    protected function getEvent($id = null)
    {
        $field = 'id';
        $value = $id ? : $this->getRequest()->get('id');

        if (null == $value) {
            $field = 'uniqueSlug';
            $value = $this->getRequest()->get('uniqueSlug');
        }

        if (empty($value)) {
            throw new \Exception('Id or uniqueSlug is mandatory');
        }

        return $this->getEventManager()->findOneBy(array($field=> $value));
    }

    public function indexAction()
    {
        $filters = $this->getRequest()->get('filters', array());
        $events  = $this->getEventDateManager()->findByFilters($filters);

        $params = array(
            'filters' => $filters,
            'events'  => $events
        );

        $response = $this->render('EluceoEventBundle:EventController:index.html.twig', $params);
        $response->setMaxAge(3600);
        $response->setPublic();

        return $response;
    }

    public function showAction()
    {
        $event = $this->getEvent();

        if (null == $event) {
            throw new NotFoundHttpException('Event not found');
        }

        // @TODO Setting up SEO

        $params = array(
            'event' => $event,
        );

        $response = $this->render('EluceoEventBundle:EventController:show.html.twig', $params);
        $response->setMaxAge(3600);
        $response->setPublic();

        return $response;
    }

    public function imageAction()
    {
        $event = $this->getEvent();

        if (null == $event) {
            throw new NotFoundHttpException('Image not found');
        }
    }

    /**
     * @return \Eluceo\EventBundle\Model\Manager\EventManagerInterface
     */
    protected function getEventManager()
    {
        return $this->get('eluceo.event.manager.event');
    }

    /**
     * @return \Eluceo\EventBundle\Model\Manager\EventDateManagerInterface
     */
    protected function getEventDateManager()
    {
        return $this->get('eluceo.event.manager.eventdate');
    }
}