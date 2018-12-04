<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MusicAdmin extends AbstractAdmin
{
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->addIdentifier('id')
          ->add('title')
        //   ->add('title')

        //   ->add('_action', 'actions', array(
        //     'actions' => array(
        //       'Clone' => array(
        //         'template' => 'AppBundle:CRUD:list__action_clone.html.twig'
        //       )
        //     )
        //   ))    
      ;
  }

  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
          ->add('title', TextType::class)          
          ->add('code', TextareaType::class)
          ->add('starred')
          ->add('active')
      ;
  }

//   protected function configureRoutes(RouteCollection $collection)
//   {
//     $collection->add('clone', $this->getRouterIdParameter().'/clone');
//   }
}