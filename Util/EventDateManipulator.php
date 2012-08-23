<?php

namespace Eluceo\EventBundle\Util;

class EventDateManipulator
{
    /**
     * Normalizes Filter-Array
     *
     * @static
     * @param array $filters
     * @return array
     */
    public static function normalizeFilters(array $filters)
    {
        $filters = array_merge(array(
            'date_from'     => date('Y-m-d'),
            'date_to'       => null,
            'categories'    => null,
            'max_results'   => null,
            'page'          => null,
            'order_by'      => 'ed.start_datetime',
            'order'         => 'ASC',
            'gallery_only'  => false,
            'active'        => true
        ), $filters);

        return $filters;
    }
}