<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
        ->add('title', TextType::class, array('required' => true, 'label' => 'Название'))        
        ->add('path', TextType::class, array('required' => false, 'label' => 'Адрес'))
      ;
  }
}