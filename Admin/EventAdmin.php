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
            ->add('location')
            ->add('active');
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name')
            ->add('name2')
            ->add('description')
            ->add('shortDescription')
            ->add('categories', 'sonata_type_model', array('multiple' => true,
                                                           'expanded' => true))
            ->add('location', 'sonata_type_model')
            ->add('active', null, array('required' => false))
            ->add('uniqueSlug', null, array('required' => false));

        $link_parameters = array('context' => 'eluceo_e_image');
        $form->add('image', 'sonata_type_model_list', array(), array('link_parameters' => $link_parameters));

        $form->add('eventDates',
            'sonata_type_collection',
            array(
                'by_reference' => true,
            ), array(
                'edit'      => 'inline',
                'inline'    => 'table',
            )
        );

        $parent = $this->getParent();
        if ($this->isChild() && $parent instanceof LocationAdmin) {
            $form->remove('location');
        }
    }
}