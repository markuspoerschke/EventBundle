<?php

namespace Eluceo\EventBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

class EventDateAdmin extends Admin
{
    protected function configureFormFields(FormMapper $form)
    {
        $emptyValue = array(
            'year' => $this->trans('year'),
            'month' => $this->trans('month'),
            'day' => $this->trans('day'),
            'hour' => $this->trans('hour'),
            'minute' => $this->trans('minute')
        );

        $form
            ->add('active', null, array('required' => false, 'value' => true))
            ->add('startDatetime', null, array('empty_value' => $emptyValue))
            ->add('endDatetime', null, array('empty_value' => $emptyValue))
            ->add('noTime', null, array('required' => false));
    }
}
