<?php

namespace Eluceo\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Eluceo\EventBundle\Export\Event\iCal as iCalExporter;

class EventExportController extends Controller
{
    public function exportAction($type)
    {
        $filters = $this->getRequest()->get('filters', array());
        $items   = $this->getEventDateManager()->findByFilters($filters);

        switch ($type) {
            case 'ical':
                $exporter = new iCalExporter($items);
                break;
            default:
                throw new \InvalidArgumentException("There is no type {$type}.");
        }

        return $exporter->render();
    }

    /**
     * @return \Eluceo\EventBundle\Model\Manager\EventDateManagerInterface
     */
    protected function getEventDateManager()
    {
        return $this->get('eluceo.event.manager.eventdate');
    }
}