<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BlockT228Admin extends BlockAdmin
{
  private $type = 't228';
  protected $baseRouteName = 'admin_appbundle_t228admin';
  protected $baseRoutePattern = 't228-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
        ->add('custtextattr01', TextareaType::class, array('label' => 'Меню'))
      ->end()
      ->with("Facebook", array('class' => 'col-md-5'))
        ->add('custboolattr01', null, array('label' => 'Показать'))
        ->add('custstrattr01', TextType::class, array('required' => false, 'label' => 'Адрес'))
      ->end()
      ->with("VK", array('class' => 'col-md-5'))
        ->add('custboolattr02', null, array('label' => 'Показать'))
        ->add('custstrattr02', TextType::class, array('required' => false, 'label' => 'Адрес'))
      ->end()
      ->with("Logo", array('class' => 'col-md-7'))
        ->add('custmediattr01', 'sonata_type_model_list',
          array('label'=>'Logo'),
          array('link_parameters' =>
            array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.image')))
        ->add('custstrattr06', TextType::class, array('required' => false, 'label' => 'Ширина'))
      ->end()
      ->with("Instagram", array('class' => 'col-md-5'))
        ->add('custboolattr03', null, array('label' => 'Показать'))
        ->add('custstrattr03', TextType::class, array('required' => false, 'label' => 'Адрес'))
      ->end()
      ->with("Кнопка", array('class' => 'col-md-5'))
        ->add('custboolattr04', null, array('label' => 'Показать'))
        ->add('custstrattr04', TextType::class, array('required' => false, 'label' => 'Адрес'))
        ->add('custstrattr05', TextType::class, array('required' => false, 'label' => 'Заголовок'))
      ->end()
    ;
  }

  public function createQuery($context = 'list')
  {
    $em = $this->modelManager->getEntityManager('AppBundle\Entity\Block');

    $queryBuilder = $em
      ->createQueryBuilder('blocks')
      ->select('blocks')
      ->from('AppBundle:Block', 'blocks')
      ->where('blocks.type = :type')
      ->setParameter('type', $this->type);
    ;

    $query = new ProxyQuery($queryBuilder);
    return $query;
  }

  public function prePersist($block)
  {
    $block->setType($this->type);
  }
}