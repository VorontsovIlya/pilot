<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class NewsAdmin extends AbstractAdmin
{
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->addIdentifier('id')
      ->addIdentifier('title')
      ->add('public')
    ;
  }

  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
        ->with("Новость", array('class' => 'col-md-7'))
          ->add('public')
          ->add('title', TextType::class)
          ->add('tag', TextType::class, array('required' => false))
          ->add('newsdate', DateType::class, array(
            'required' => false, 'label' => 'Дата'))
          ->add('picture', 'sonata_type_model_list',
            array('label'=>'Картинка'),
            array('link_parameters' =>
              array('context' => 'news', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.image')))
          ->add('descr', CKEditorType::class, array(
            'label' => 'Краткая статья', 'config_name' => 'config_t470'))
          ->add('content', CKEditorType::class, array(
            'label' => 'Полный текст', 'config_name' => 'config_t470'))
        ->end()
      ;
  }
}