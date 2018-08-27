<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Entity\Feedback;

class FeedbackType extends AbstractType
{
    // /**
    //  * @param FormBuilderInterface $builder
    //  * @param array $options
    //  */
    // public function buildForm(FormBuilderInterface $builder, array $options)
    // {
    //     // $builder
    //     //     ->add('mail')
    //     //     ->add('name')
    //     //     ->add('phone')  
    //     //     ->add('type', 'choice', [
    //     //         'choices'  => Feedback::getTypes(),
    //     //         'expanded' => false])
    //     // ;
    // }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Feedback',
            'csrf_protection' => false,
            // 'csrf_field_name' => '_token',
            // // a unique key to help generate the secret token
            // 'intention'       => 'task_item_intention',
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_feedback';
    }
}
