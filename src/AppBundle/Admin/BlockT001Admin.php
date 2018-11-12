<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BlockT001Admin extends BlockAdmin
{
  private $type = 't001';
  protected $baseRouteName = 'admin_appbundle_t001admin';
  protected $baseRoutePattern = 't001-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
      ->end()
      ->with("Обложжка", array('class' => 'col-md-7'))
        ->add('custmediattr01', 'sonata_type_model_list',
          array('label'=>'Фон'),
          array('link_parameters' =>
            array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.image')))      
        ->add('custstrattr03', TextType::class, array('label' => 'Верхний заголовок'))
        ->add('custstrattr01', TextType::class, array('label' => 'Заголовок'))
        ->add('custstrattr02', TextType::class, array('label' => 'Описание'))
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