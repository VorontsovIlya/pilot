<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactAdmin extends AbstractAdmin
{
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->addIdentifier('id')          
          ->add('title')
          ->add('name')
      ;
  }  

  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
        ->add('title', TextType::class, array('required' => true, 'label' => 'Заголовок'))
        ->add('name', TextType::class, array('required' => false, 'label' => 'ФИО'))
        ->add('descr', TextType::class, array('required' => false, 'label' => 'Описание'))
        ->add('phone', TextType::class, array('required' => false, 'label' => 'Телефон'))
        ->add('mail', TextType::class, array('required' => false, 'label' => 'E-mail'))
      ;
  }
}