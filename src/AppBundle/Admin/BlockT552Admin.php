<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;

class BlockT552Admin extends BlockAdmin
{
  private $type = 't552';
  protected $baseRouteName = 'admin_appbundle_t552admin';
  protected $baseRoutePattern = 't552-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
        ->add('custstrattr01', ChoiceType::class, array(
          'choices' => array('2' => '2', '3' => '3', '4' => '4'),
          'label' => 'Количество в ряд'
        ))
        ->add('slides01', 'sonata_type_model',
            array('multiple' => true, 'by_reference' => false, 'btn_add' => true, 'label' => 'Слайды'))
        ->add('custstrattr02', ColorType::class, array('required' => false, 'label' => 'Цвет фона'))
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