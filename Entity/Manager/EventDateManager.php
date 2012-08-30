<?php

namespace Eluceo\EventBundle\Entity\Manager;

use Eluceo\EventBundle\Model\Manager\EventDateManagerInterface;

class EventManager implements EventDateManagerInterface
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var \Knp\Component\Pager\Paginator
     */
    protected $paginator;

    function __construct(\Doctrine\ORM\EntityManager $em, $class)
    {
        $this->em    = $em;
        $this->class = $class;
    }

    /**
     * @param array $filters
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findByFilters(array $filters)
    {
        return $this->getQueryWithFilters($filters)->getResult();
    }

    protected function getQueryWithFilters(array $filters)
    {
        $qb = $this->em->getRepository($this->class)->createQueryBuilder('ed');

        $qb->leftJoin('ed.event', 'e');

        $filters = \Eluceo\EventBundle\Util\EventManipulator::normalizeFilters($filters);

        if (null != @$filters['active']) {
            $qb
                ->where('e.active = :active AND ed.active = :active')
                ->setParameter('active', $filters['active'] ? 1 : 0);
        }

        // Date From
        if (@$filters['date_from']) {
            $qb
                ->andWhere('ed.start_datetime >= :date_from OR ed.end_datetime >= :date_from')
                ->setParameter('date_from', $filters['date_from']);
        }

        // Date To
        if (@$filters['date_to']) {
            $qb->andWhere('ed.start_datetime <= :date_to')
                ->setParameter('date_to', $filters['date_to']);
        }

        // Gallery Only
        if (@$filters['gallery_only']) {
            $qb->andWhere('e.gallery IS NOT NULL');
        }

        // Filter Categories
        if (@$filters['categories']) {
            $qb->leftJoin('e.categories', 'c')
                ->andWhere('c.id IN (:categories)')
                ->setParameter('categories', $filters['categories']);
        }

        // Pagination
        /*if (null != @$filters['max_per_page']) {
            $maxResults  = $filters['max_results'];
            $firstResult = $filters['page'] * $maxResults;

            $qb->setMaxResults($maxResults)
                ->setFirstResult($firstResult);
        }*/

        // Order
        if (@$filters['order_by']) {
            $qb->orderBy($filters['order_by'], $filters['order']);
        }

        return $qb->getQuery();
    }

    /**
     * @param array $filters
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function getPaginationWithFilters(array $filters)
    {
        $page       = isset($filters['page']) ? $filters['page'] : null;
        $maxResults = isset($filters['max_results']) ? $filters['max_results'] : null;

        $query      = $this->getQueryWithFilters($filters);
        $pagination = $this->getPaginator()->paginate(
            $query,
            $page,
            $maxResults
        );

        return $pagination;
    }

    /**
     * @return \Knp\Component\Pager\Paginator
     */
    protected function getPaginator()
    {
        return $this->paginator;
    }
}