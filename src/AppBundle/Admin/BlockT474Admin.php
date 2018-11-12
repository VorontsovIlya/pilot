<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class BlockT474Admin extends BlockAdmin
{
  private $type = 't474';
  protected $baseRouteName = 'admin_appbundle_t474admin';
  protected $baseRoutePattern = 't474-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
      ->end()
      ->with("Заголовок", array('class' => 'col-md-7'))
        ->add('custtextattr01', CKEditorType::class, array(
          'label' => 'Текст', 'config_name' => 'config_t470'))
        ->add('custstrattr04', ColorType::class, array('required' => false, 'label' => 'Цвет фона'))
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