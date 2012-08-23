<?php

namespace Eluceo\EventBundle\Model\Manager;

interface EventManagerInterface
{
    /**
     * @abstract
     * @param array $criteria
     * @return \Eluceo\EventBundle\Model\Event
     */
    public function findOneBy(array $criteria);
}