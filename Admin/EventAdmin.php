<?php
namespace Eluceo\EventBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EventAdmin extends Admin
{
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name')
            ->add('location.name')
            ->add('active');
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name')
            ->add('name2')
            ->add('description')
            ->add('shortDescription')
            ->add('categories', 'sonata_type_model', array('multiple' => true, 'expanded' => true))
            ->add('location', 'sonata_type_model')
            ->add('active')
            ->add('eventDates', 'sonata_type_collection', array(
                'by_reference' => false,
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable'  => 'position',
            ));

        $parent = $this->getParent();
        if ($this->isChild() && $parent instanceof LocationAdmin) {
            $form->remove('location');
        }
    }
}