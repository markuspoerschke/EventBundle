<?php

namespace Eluceo\EventBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class EventDateAdmin extends Admin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('startDatetime')
            ->add('endDatetime')
            ->add('noTime', null, array('required' => false));
    }
}