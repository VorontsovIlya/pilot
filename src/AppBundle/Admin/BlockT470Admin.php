<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class BlockT470Admin extends BlockAdmin
{
  private $type = 't470';
  protected $baseRouteName = 'admin_appbundle_t470admin';
  protected $baseRoutePattern = 't470-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
      ->end()
      ->with("Кнопка", array('class' => 'col-md-5'))
        ->add('custboolattr02', null, array('label' => 'Показать'))
        ->add('custstrattr02', TextType::class, array('required' => false, 'label' => 'Адрес'))
        ->add('custstrattr03', TextType::class, array('required' => false, 'label' => 'Заголовок'))
      ->end()
      ->with("Описание", array('class' => 'col-md-7'))
        ->add('custstrattr01', TextType::class, array('required' => false, 'label' => 'Заголовок'))
        ->add('custtextattr01', CKEditorType::class, array(
          'label' => 'Текст', 'config_name' => 'config_t470'))
      ->end()
      ->with("Logo", array('class' => 'col-md-5'))
        ->add('custboolattr01', null, array('label' => 'Показать'))
        ->add('custmediattr01', 'sonata_type_model_list',
          array('label'=>'Logo'),
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