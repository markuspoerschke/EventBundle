<?php
namespace Eluceo\EventBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EventAdmin extends Admin
{
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name')
            ->add('location')
            ->add('eventDates')
            ->add('active');

        $parent = $this->getParent();
        if ($this->isChild() && $parent instanceof LocationAdmin) {
            $list->remove('location');
        }
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show->add('name')
            ->add('name2')
            ->add('description')
            ->add('shortDescription')
            ->add('categories')
            ->add('location')
            ->add('image')
            ->add('eventDates')
            ->with('Meta')
            ->add('active')
            ->add('uniqueSlug');
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
            ->add('location', 'sonata_type_model');

        $link_parameters = array('context' => 'eluceo_e_image');
        $form->add('image', 'sonata_type_model_list', array(), array('link_parameters' => $link_parameters));

        $form->add('eventDates',
            'sonata_type_collection',
            array(
                'by_reference' => false,
            ), array(
                'edit'      => 'inline',
                'inline'    => 'table',
            )
        );

        $form->with('Meta')
            ->add('active', null, array('required' => false))
            ->add('uniqueSlug', null, array('required' => false));

        $parent = $this->getParent();
        if ($this->isChild() && $parent instanceof LocationAdmin) {
            $form->remove('location');
        }
    }
}