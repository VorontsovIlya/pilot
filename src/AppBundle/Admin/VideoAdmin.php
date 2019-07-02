<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class VideoAdmin extends AbstractAdmin
{
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->addIdentifier('id')
          ->add('artist')
          ->addIdentifier('title')
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
        ->with("Настройка", array('class' => 'col-md-7'))
          ->add('active', null, array('required' => false, 'label' => 'Опубликовать'))          
          ->add('artist', 'sonata_type_model_list', array('required' => false, 'label'=>'Артист'))
          ->add('title', TextType::class, array('required' => false, 'label' => 'Название'))
          ->add('releasedate', null, array('required' => false, 'label' => 'Дата релиза'))
          ->add('video', 'sonata_type_model_list', array('required' => false, 'label' => 'Ссылка на видео'))
        ->end()
      ;
  }

//   protected function configureRoutes(RouteCollection $collection)
//   {
//     $collection->add('clone', $this->getRouterIdParameter().'/clone');
//   }
}