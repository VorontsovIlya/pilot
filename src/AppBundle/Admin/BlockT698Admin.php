<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BlockT698Admin extends BlockAdmin
{
  private $type = 't698';
  protected $baseRouteName = 'admin_appbundle_t698admin';
  protected $baseRoutePattern = 't698-block';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->with("Настройка", array('class' => 'col-md-7'))
        ->add('path', TextType::class)
        ->add('order', TextType::class)
        ->add('comment', TextType::class)
        ->add('custboolattr01', null, array('label' => 'Активно'))       
      ->end()
      ->with("Обратная связь", array('class' => 'col-md-7'))
        ->add('custtextattr01', TextareaType::class, array('label' => 'Форма'))
        ->add('custstrattr01', TextType::class, array('required' => false, 'label' => 'Заголовок'))
        ->add('custstrattr02', TextType::class, array('required' => false, 'label' => 'Описание'))
        ->add('custstrattr03', TextType::class, array('required' => false, 'label' => 'Успешная отправка'))
        ->add('custstrattr04', TextType::class, array('required' => false, 'label' => 'Неактивно Заголовок'))
        ->add('custstrattr05', TextType::class, array('required' => false, 'label' => 'Неактивно Описание'))
        ->add('custstrattr06', TextType::class, array('required' => false, 'label' => 'Неактивно уведомление'))
        ->add('custstrattr07', TextType::class, array('required' => false, 'label' => 'Кнопка'))
        ->add('custmediattr01', 'sonata_type_model_list',
          array('label'=>'Положением об обработке и защите ПД'),
          array('link_parameters' =>
            array('context' => 'default', '_list_mode'=>'list', 'provider' => 'sonata.media.provider.file')))
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