<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BlockT345Admin extends BlockAdmin
{
  private $type = 't345';
  protected $baseRouteName = 'admin_appbundle_t345admin';
  protected $baseRoutePattern = 't345-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
        ->add('custstrattr05', TextType::class, array('required' => false, 'label' => 'Copyright'))
      ->end()
      ->with("Социальные сети", array('class' => 'col-md-7'))
        ->add('custboolattr01', null, array('label' => 'Показать Facebook'))
        ->add('custboolattr02', null, array('label' => 'Показать VK'))
        ->add('custboolattr03', null, array('label' => 'Показать OK'))
        ->add('custboolattr04', null, array('label' => 'Показать Twitter'))
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