<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BlockT494Admin extends BlockAdmin
{
  private $type = 't494';
  protected $baseRouteName = 'admin_appbundle_t494admin';
  protected $baseRoutePattern = 't494-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
        ->add('custstrattr05', TextType::class, array('required' => false, 'label' => 'Заголовок'))
        ->add('contacts01', 'sonata_type_model',
            array('multiple' => true, 'by_reference' => false, 'btn_add' => true, 'label' => 'Контакты'))
      ->end()
      ->with("Facebook", array('class' => 'col-md-5'))
        ->add('custboolattr01', null, array('label' => 'Показать'))
        ->add('custstrattr01', TextType::class, array('required' => false, 'label' => 'Адрес'))
      ->end()
      ->with("VK", array('class' => 'col-md-5'))
        ->add('custboolattr02', null, array('label' => 'Показать'))
        ->add('custstrattr02', TextType::class, array('required' => false, 'label' => 'Адрес'))
      ->end()
      ->with("Instagram", array('class' => 'col-md-7'))
        ->add('custboolattr03', null, array('label' => 'Показать'))
        ->add('custstrattr03', TextType::class, array('required' => false, 'label' => 'Адрес'))
      ->end()
      ->with("Youtube", array('class' => 'col-md-5'))
        ->add('custboolattr04', null, array('label' => 'Показать'))
        ->add('custstrattr04', TextType::class, array('required' => false, 'label' => 'Адрес'))
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