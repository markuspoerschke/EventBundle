<?php

namespace Eluceo\EventBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Show\ShowMapper;

class LocationAdmin extends Admin
{
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name')
            ->add('street')
            ->add('city');
    }

    protected function configureFormFields(FormMapper $form)    
    {
        $form
            ->add('name')
            ->add('description', null, array('required' => false))
            ->add('street')
            ->add('zip')
            ->add('city')
            ->add('uniqueSlug', null, array('required' => false));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('description')
            ->add('uniqueSlug')
            ->with('Address')
            ->add('street')
            ->add('zip')
            ->add('city');
    }

    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        $id = $this->getRequest()->get('id');

        if (null !== $id) {
            $menu->addChild(
                'edit',
                array(
                    'label' => $this->trans('sidemenu.edit'),
                    'uri'   => $this->generateUrl('edit', array('id' => $id))
                )
            );

            $menu->addChild(
                'events',
                array(
                    'label'=> $this->trans('sidemenu.event_list'),
                    'uri'  => $this->generateUrl('eluceo.event.admin.event.list', array('id' => $id))
                )
            );
        }
    }
}