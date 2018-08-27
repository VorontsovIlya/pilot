<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FeedbackAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('field01', TextType::class)       
            ->add('field02', TextType::class)       
            ->add('field03', TextType::class)       
            ->add('field04', TextType::class)       
            ->add('field05', TextType::class)       
            ->add('field06', TextType::class)       
            ->add('field07', TextType::class)       
            ->add('field08', TextType::class)       
            ->add('field09', TextType::class)       
            ->add('field10', TextType::class)       
        ;
    }

    // protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    // {
    //     $datagridMapper
    //         ->add('name')            
    //     ;
    // }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('field01')
            ->add('field02')
            ->add('field03')
        ;
    }
}