<?php
namespace AppBundle\Admin;

use Doctrine\ORM\Mapping\AnsiQuoteStrategy;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class BlockT415Admin extends AbstractAdmin
{
  private $type = 't415';
  protected $baseRouteName = 'admin_appbundle_t415admin';
  protected $baseRoutePattern = 't415-block';

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
      ->with("Кнопка", array('class' => 'col-md-5'))
        ->add('custboolattr01', null, array('label' => 'Показать'))
        ->add('custstrattr04', TextType::class, array('required' => false, 'label' => 'Адрес'))
        ->add('custstrattr05', TextType::class, array('required' => false, 'label' => 'Заголовок'))
      ->end()
      ->with("Дедлайн", array('class' => 'col-md-7'))
        ->add('custstrattr01', TextType::class, array('required' => false, 'label' => 'Заголовок'))
        ->add('custstrattr02', TextType::class, array('required' => false, 'label' => 'Описание'))
        ->add('custdtattr01', DateTimeType::class, array(
          'required' => false, 'label' => 'Дата'))          
      ->end()
      ->with("Картинки", array('class' => 'col-md-5'))
        ->add('custmediattr01', 'sonata_type_model_list',
          array('label'=>'Logo'),
          array('link_parameters' =>
            array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.image')))
        ->add('custmediattr02', 'sonata_type_model_list',
          array('label'=>'Фон'),
          array('link_parameters' =>
            array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.image')))        
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