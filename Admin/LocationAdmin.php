<?php

namespace Eluceo\EventBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;

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

    protected function configureSideMenu(MenuItemInterface $menu, $action, Admin $childAdmin = null)
    {
        $id = $this->getRequest()->get('id');

        if (null !== $id) {
            $menu->addChild(
                'edit',
                array(
                    'label' => $this->trans('sidemenu_edit'),
                    'uri'   => $this->generateUrl('edit', array('id' => $id))
                )
            );

            $menu->addChild(
                'projects',
                array(
                    'label'=> $this->trans('sidemenu_event_list'),
                    'uri'  => $this->generateUrl('eluceo.event.admin.event.list', array('id' => $id))
                )
            );
        }
    }
}