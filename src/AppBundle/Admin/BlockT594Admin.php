<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BlockT594Admin extends BlockAdmin
{
  private $type = 't594';
  protected $baseRouteName = 'admin_appbundle_t594admin';
  protected $baseRoutePattern = 't594-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
        ->add('custstrattr01', TextType::class, array('label' => 'Заголовок'))
        ->add('slides01', 'sonata_type_model',
          array('multiple' => true, 'by_reference' => false, 'btn_add' => true, 'label' => 'Слайды'))
        ->add('custstrattr02', ChoiceType::class, array(
            'choices' => array('3' => '3', '4' => '4', '5' => '5', '6' => '6'),
            'label' => 'Количество в ряд'
        ))
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