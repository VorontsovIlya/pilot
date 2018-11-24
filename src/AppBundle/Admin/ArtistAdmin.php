<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class ArtistAdmin extends AbstractAdmin
{
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->addIdentifier('id')
          ->add('title')
      ;
  }

  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
        ->with("Страница", array('class' => 'col-md-7'))
          ->add('title', TextType::class, array('required' => true, 'label' => 'Название'))
          ->add('path', TextType::class, array('required' => false, 'label' => 'Адрес'))
        ->end()
        ->with("Артист", array('class' => 'col-md-7'))
          ->add('descr', CKEditorType::class, array(
            'label' => 'Краткое описание', 'config_name' => 'default', 'required' => false))
          ->add('slides01', 'sonata_type_model',
            array('multiple' => true, 'by_reference' => false, 'btn_add' => true,
              'label' => 'Слайды (верхняя часть)', 'required' => false))
          ->add('content', CKEditorType::class, array(
            'label' => 'Содержание', 'config_name' => 'default', 'required' => false))
          ->add('slides02', 'sonata_type_model',
            array('multiple' => true, 'by_reference' => false, 'btn_add' => true,
              'label' => 'Слайды (нижняя часть)', 'required' => false))
          ->add('video01', 'sonata_type_model_list',
              array('label'=>'Видео 1'),
              array('link_parameters' =>
                array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.youtube')))          
          ->add('videodescr01', CKEditorType::class, array(
            'label' => 'Заголовок видео 1', 'config_name' => 'default', 'required' => false))
          ->add('video02', 'sonata_type_model_list',
              array('label'=>'Видео 2'),
              array('link_parameters' =>
                array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.youtube')))
          ->add('videodescr02', CKEditorType::class, array(
              'label' => 'Заголовок видео 2', 'config_name' => 'default', 'required' => false))
        ->end()
      ;
  }
}