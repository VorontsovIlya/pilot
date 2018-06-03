<?php
namespace AppBundle\Admin;

use Doctrine\ORM\Mapping\AnsiQuoteStrategy;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class BlockT030Admin extends AbstractAdmin
{
  private $type = 't030';
  protected $baseRouteName = 'admin_appbundle_t030admin';
  protected $baseRoutePattern = 't030-block';


  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->addIdentifier('id')
      ->add('path')
      ->add('order')
      ->add('comment')
    ;
  }

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
      ->end()
      ->with("Заголовок", array('class' => 'col-md-7'))
        ->add('custstrattr01', TextType::class, array('required' => false, 'label' => 'Заголовок'))
        ->add('custstrattr02', TextType::class, array('required' => false, 'label' => 'Текст'))
        ->add('custstrattr03', ColorType::class, array('required' => false, 'label' => 'Цвет текста'))
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