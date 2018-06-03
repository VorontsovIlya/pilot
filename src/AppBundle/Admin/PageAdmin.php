<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PageAdmin extends AbstractAdmin
{
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->addIdentifier('id')
          ->add('path')
          ->add('title')
      ;
  }

  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
          ->add('title', TextType::class)
          ->add('path', TextType::class)
          ->add('blocks', TextType::class)
      ;
  }
}