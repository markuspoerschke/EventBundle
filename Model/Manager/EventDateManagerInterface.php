<?php

namespace Eluceo\EventBundle\Model\Manager;

interface EventDateManagerInterface
{
    /**
     * @abstract
     * @param array $filters
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findByFilters(array $filters);
}