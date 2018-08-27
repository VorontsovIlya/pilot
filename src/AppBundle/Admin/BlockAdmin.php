<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class BlockAdmin extends AbstractAdmin
{
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->addIdentifier('id')
      ->add('path')
      ->add('order')
      ->add('comment')
      ->add('_action', 'actions', array(
        'actions' => array(
          'Clone' => array(
            'template' => 'AppBundle:CRUD:list__action_clone.html.twig'
          )
        )
      ))
    ;
  }

  protected function configureRoutes(RouteCollection $collection)
  {
    $collection->add('clone', $this->getRouterIdParameter().'/clone');
  }
}