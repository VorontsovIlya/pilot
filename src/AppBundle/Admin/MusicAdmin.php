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
          ->add('hidden', null, array('required' => false, 'label' => 'Скрытый'))
          ->add('link', TextType::class, array('required' => false, 'label' => 'Ссылка'))
          ->add('artist', 'sonata_type_model_list', array('required' => false, 'label'=>'Артист'))
          ->add('title', TextType::class, array('required' => false, 'label' => 'Название'))
          ->add('releasedate', null, array('required' => false, 'label' => 'Дата релиза'))
          ->add('video', 'sonata_type_model_list', array('required' => false, 'label' => 'Ссылка на видео'))
          ->add('image', 'sonata_type_model_list', array('required' => false, 'label' => 'Постер'),
            array('link_parameters' => array('context' => 'release', 'hide_context' => true)))
        ->end()
        ->with("Медиа хостинги", array('class' => 'col-md-7'))
          ->add('link_itunes', null, array('required' => false, 'label' => 'iTunes'))
          ->add('link_apple', null, array('required' => false, 'label' => 'Apple Music'))
          ->add('link_gplay', null, array('required' => false, 'label' => 'Google Play'))
          ->add('link_vk', null, array('required' => false, 'label' => 'VK Music'))
          ->add('link_spotify', null, array('required' => false, 'label' => 'Spotify'))
          ->add('link_deezer', null, array('required' => false, 'label' => 'Deezer'))
          ->add('link_yam', null, array('required' => false, 'label' => 'Yandex Music'))
          ->add('social_boom', null, array('required' => false, 'label' => 'BOOM'))
          ->add('social_zvooq', null, array('required' => false, 'label' => 'Zvooq'))
          ->add('social_tiktok', null, array('required' => false, 'label' => 'TikTok'))
        ->end()
        ->with("Социальные сети", array('class' => 'col-md-7'))
          ->add('social_fb', null, array('required' => false, 'label' => 'Facebook'))
          ->add('social_vk', null, array('required' => false, 'label' => 'VK'))
          // ->add('social_tw', null, array('required' => false, 'label' => 'Twitter'))
          ->add('social_ytube', null, array('required' => false, 'label' => 'YouTube'))
          ->add('social_inst', null, array('required' => false, 'label' => 'Instagram'))
        ->end()
      ;
  }

//   protected function configureRoutes(RouteCollection $collection)
//   {
//     $collection->add('clone', $this->getRouterIdParameter().'/clone');
//   }
}