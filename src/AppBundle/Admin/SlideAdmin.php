<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Route\RouteCollection;

class SlideAdmin extends AbstractAdmin 
{
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->addIdentifier('id')          
      ->add('title')
      ->add('_action', 'actions', array(
        'actions' => array(
          'Clone' => array(
            'template' => 'AppBundle:CRUD:list__action_clone.html.twig'
          )
        )
      ))
    ;
  }

  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
        ->with("Настройка", array('class' => 'col-md-7'))
            ->add('title', TextType::class)        
        ->end()
        ->with("Слайд", array('class' => 'col-md-7'))
            ->add('image', 'sonata_type_model_list',
                array('label'=>'Картинка'),
                array('link_parameters' =>
                    array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.image')))
            ->add('video', 'sonata_type_model_list',
                array('label'=>'Видео', 'required' => false),
                array('link_parameters' =>
                    array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.youtube')))
            ->add('slide_title', TextType::class, array('required' => false, 'label' => 'Заголовок слайда'))
            ->add('slide_descr', TextType::class, array('required' => false, 'label' => 'Описание слайда'))            
            ->add('button', TextType::class, array('required' => false, 'label' => 'Текст кнопки'))
            ->add('link', TextType::class, array('required' => false, 'label' => 'Ссылка кнопки или слайда'))
        ->end()
      ;
  }

  protected function configureRoutes(RouteCollection $collection)
  {
      $collection->add('clone', $this->getRouterIdParameter().'/clone');
  }
}