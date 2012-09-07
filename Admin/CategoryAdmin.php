<?php

namespace Eluceo\EventBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class CategoryAdmin extends Admin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name')
            ->add('active', null, array('required' => false))
            ->add('uniqueSlug', null, array('required' => false));
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name')
            ->add('active');
    }
}