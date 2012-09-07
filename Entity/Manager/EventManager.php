<?php

namespace Eluceo\EventBundle\Entity\Manager;

use Eluceo\EventBundle\Model\Manager\EventManagerInterface;

class EventManager implements EventManagerInterface
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    function __construct(\Doctrine\ORM\EntityManager $em, $class)
    {
        $this->em    = $em;
        $this->class = $class;
    }

    /**
     * @param array $criteria
     * @return \Eluceo\EventBundle\Model\Event
     */
    public function findOneBy(array $criteria)
    {
        return $this->em->getRepository($this->class)->findOneBy($criteria);
    }
}