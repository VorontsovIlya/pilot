<?php
namespace AppBundle\Admin;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
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
            ->with("Страница", array('class' => 'col-md-7'))
            ->add('title', TextType::class, array('required' => true, 'label' => 'Название'))
            ->add('path', TextType::class, array('required' => true, 'label' => 'Адрес'))
            // ->add('route', TextType::class, array('required' => false, 'label' => 'Постер'))
            ->end()

            ->with("Картинки", array('class' => 'col-md-5'))
            ->add('image', 'sonata_type_model_list', array('required' => false, 'label' => 'Постер'),
                array('link_parameters' => array('context' => 'artist', 'hide_context' => true)))
            // ->add('poster', 'sonata_type_model_list', array('required' => false, 'label' => 'Постер (квадратный)'),
            //     array('link_parameters' => array('context' => 'artist', 'hide_context' => true)))
            ->add('slides01', 'sonata_type_model',
                array('multiple' => true, 'by_reference' => false, 'btn_add' => true,
                    'label' => 'Слайды (нижняя часть)', 'required' => false))
            ->end()

            ->with("Артист", array('class' => 'col-md-7'))
            ->add('content', CKEditorType::class, array(
                'label' => 'Содержание', 'config_name' => 'default', 'required' => false))
            ->end()

            ->with("Социальные сети", array('class' => 'col-md-5'))
            ->add('social_fb', null, array('required' => false, 'label' => 'Facebook'))
            ->add('social_vk', null, array('required' => false, 'label' => 'VK'))
            ->add('social_ytube', null, array('required' => false, 'label' => 'YouTube'))
            ->add('social_inst', null, array('required' => false, 'label' => 'Instagram'))
            ->end()
        ;
    }
}
