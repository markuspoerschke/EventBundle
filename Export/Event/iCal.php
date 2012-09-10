<?php

namespace Eluceo\EventBundle\Export\Event;

use Eluceo\EventBundle\Export\AbstractExport;
use Eluceo\iCal\Component\Event as VEvent;
use Eluceo\iCal\Component\Calendar as VCalendar;
use Eluceo\EventBundle\Model\EventDate;

use Symfony\Component\HttpFoundation\Response;

class iCal extends AbstractExport
{
    function render()
    {
        $vCalendar = new VCalendar('ELUCEOEVENTBUNDLE');
        foreach ($this->items as $eventDate) {
            $vCalendar->addEvent($this->createVEvent($eventDate));
        }

        $response = new Response($vCalendar->render());
        $response->headers->set('Content-Type', 'text/calendar; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="cal.ics"');

        return $response;
    }

    function createVEvent(EventDate $eventDate)
    {
        $vEvent = new VEvent('event_' . $eventDate->getId());

        $vEvent->setDtStart($eventDate->getStartDatetime());
        $vEvent->setDtEnd($eventDate->getEndDatetime());
        $vEvent->setNoTime($eventDate->getNoTime());
        $vEvent->setUniqueId($eventDate->getId());
        $vEvent->setLocation($eventDate->getEvent()->getLocation()->__toString());
        $vEvent->setSummary($eventDate->getEvent()->getName());

        return $vEvent;
    }
}