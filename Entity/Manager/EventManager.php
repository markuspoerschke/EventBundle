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

    /**
     * @param array $filters
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findByFilters(array $filters)
    {
        $qb = $this->em->getRepository($this->class)->createQueryBuilder('e');

        $filters = \Eluceo\EventBundle\Util\EventManipulator::normalizeFilters($filters);

        if (null != @$filters['active']) {
            $qb
                ->where('e.active = :active')
                ->setParameter('active', $filters['active'] ? 1 : 0);
        }

        // Date From
        if (@$filters['date_from']) {
            $qb
                ->andWhere('event.start_datetime >= :date_from OR event.end_datetime >= :date_from')
                ->setParameter('date_from', $filters['date_from']);
        }

        // Date To
        if (@$filters['gallery_only']) {
            $qb->andWhere('event.gallery IS NOT NULL');
        }

        // Date To
        if (@$filters['date_to']) {
            $qb->andWhere('event.start_datetime <= :date_to')
                ->setParameter('date_to', $filters['date_to']);
        }

        // Filter Categories
        if (@$filters['categories']) {
            $qb->leftJoin('event.categories', 'c')
                ->andWhere('c.id IN (:categories)')
                ->setParameter('categories', $filters['categories']);
        }

        // Pagination
        if (null != @$filters['max_per_page']) {
            $maxResults  = $filters['max_results'];
            $firstResult = $filters['page'] * $maxResults;

            $qb->setMaxResults($maxResults)
                ->setFirstResult($firstResult);
        }

        // Order
        if (@$filters['order_by']) {
            $qb->orderBy($filters['order_by'], $filters['order']);
        }

        return $qb->getQuery()->getResult();
    }
}