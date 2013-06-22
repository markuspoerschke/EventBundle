<?php

namespace Eluceo\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eluceo\EventBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    function load(ObjectManager $manager)
    {
        // first category
        $category1 = new Category;
        $category1->setName('Party');
        $category1->setActive(true);
        $category1->setUniqueSlug('party');

        $manager->persist($category1);
        $manager->flush($category1);

        $this->setReference('category1', $category1);

        // second category
        $category2 = new Category;
        $category2->setName('Music');
        $category2->setActive(true);
        $category2->setUniqueSlug('music');

        $manager->persist($category2);
        $manager->flush($category2);

        $this->setReference('category2', $category2);
    }

    function getOrder()
    {
        return 1;
    }
}
