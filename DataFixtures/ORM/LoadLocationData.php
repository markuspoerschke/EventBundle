<?php

namespace Eluceo\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eluceo\EventBundle\Entity\Location;

class LoadLocationData extends AbstractFixture implements OrderedFixtureInterface
{
    function load(ObjectManager $manager)
    {
        // first location
        $location1 = new Location;
        $location1->setName('Gaststätte Huber');
        $location1->setCity('Velbert');
        $location1->setZip('42551');
        $location1->setStreet('Hauptstraße 1a');
        $location1->setDescription('Lorem Ipsum');

        $manager->persist($location1);
        $manager->flush();

        $this->setReference('location1', $location1);

        // second location
        $location2 = new Location;
        $location2->setName('Disco V2');
        $location2->setCity('Velbert');
        $location2->setZip('42549');
        $location2->setStreet('Friedrich-Ebert-Straße 123');
        $location2->setDescription('Dies ist eine kleine Beschreibung von einer Veranstaltung.');

        $manager->persist($location2);
        $manager->flush();

        $this->setReference('location2', $location2);
    }

    function getOrder()
    {
        return 1;
    }
}
