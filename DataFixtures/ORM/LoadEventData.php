<?php

namespace Eluceo\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eluceo\EventBundle\Entity\Event;
use Eluceo\EventBundle\Entity\Category;
use Eluceo\EventBundle\Entity\EventDate;
use Symfony\Component\Validator\Constraints\DateTime;

class LoadEventData extends AbstractFixture implements OrderedFixtureInterface
{
    function load(ObjectManager $manager)
    {
        // first event
        $event1 = new Event;
        $event1->setName('Caribic Night');
        $event1->setName2('A night full of music and cocktails');
        $event1->setUniqueSlug('caribic-night');
        $event1->setActive(true);
        $event1->setDescription('Lorem Ipsum Event Description');
        $event1->setShortDescription('Lorem Ipsum Event Short Description');

        $event1->addCategory($this->getReference('category1'));
        $event1->setLocation($this->getReference('location2'));

        $eventDate = new EventDate;
        $eventDate->setActive(true);
        $eventDate->setStartDatetime($this->createDate(7, 14, 21));
        $eventDate->setEndDatetime($this->createDate(7, 14, 23, 59));
        $event1->addEventDate($eventDate);

        $manager->persist($event1);
        $manager->flush();

        // second event
        $event2 = new Event;
        $event2->setName('Smoke & Music');
        $event2->setName2('Listen to jazz music');
        $event2->setUniqueSlug('caribic-night');
        $event2->setActive(true);
        $event2->setDescription('Lorem Ipsum Event Description');
        $event2->setShortDescription('Lorem Ipsum Event Short Description');

        $event2->addCategory($this->getReference('category2'));
        $event2->setLocation($this->getReference('location1'));

        $eventDate = new EventDate;
        $eventDate->setActive(true);
        $eventDate->setStartDatetime($this->createDate(7, 21, 18));
        $eventDate->setEndDatetime($this->createDate(7, 21, 22, 00));
        $event2->addEventDate($eventDate);

        $eventDate = new EventDate;
        $eventDate->setActive(true);
        $eventDate->setStartDatetime($this->createDate(8, 17, 18));
        $eventDate->setEndDatetime($this->createDate(8, 17, 22, 00));
        $event2->addEventDate($eventDate);

        $manager->persist($event2);
        $manager->flush();
    }

    private function createDate($month, $day, $hour = 0, $minute = 0)
    {
        $yearInterval = new \DateInterval('P1Y');

        $date = new \DateTime;
        $date->setDate(date('Y'), $month, $day);
        $date->setTime($hour, $minute);

        $minDate = new \DateTime;
        $minDate->add($yearInterval);

        if ($date < $minDate) {
            $date->add($yearInterval);
        }

        return $date;
    }

    function getOrder()
    {
        return 2;
    }
}
