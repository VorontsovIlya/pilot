<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class BlockT223Admin extends BlockAdmin
{
  private $type = 't223';
  protected $baseRouteName = 'admin_appbundle_t223admin';
  protected $baseRoutePattern = 't223-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
      ->end()
      ->with("Картинки", array('class' => 'col-md-7'))
        ->add('custmediattr01', 'sonata_type_model_list',
          array('label'=>'Левая'),
          array('link_parameters' =>
            array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.youtube')))
        ->add('custstrattr01', CKEditorType::class, array(
          'label' => 'Описание', 'config_name' => 'config_t470'))
        ->add('custmediattr02', 'sonata_type_model_list',
          array('label'=>'Правая'),
          array('link_parameters' =>
            array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.youtube')))            
        ->add('custstrattr02', CKEditorType::class, array(
          'label' => 'Описание', 'config_name' => 'config_t470'))
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