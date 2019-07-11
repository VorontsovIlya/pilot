<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;

class SlideAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('up', 'text', array('template' => 'AppBundle:admin:field_slide_up.html.twig', 'label'=>' '))
            ->add('down', 'text', array('template' => 'AppBundle:admin:field_slide_down.html.twig', 'label'=>' '))
            ->addIdentifier('id')
            ->addIdentifier('laveled_title', null, array('sortable'=>false, 'label'=>'Заголовок'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'Clone' => array(
                        'template' => 'AppBundle:CRUD:list__action_clone.html.twig',
                    ),
                ),
            ))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $subject = $this->getSubject();
        $id = $subject->getId();

        $formMapper
            ->with("Настройка", array('class' => 'col-md-7'))
            ->add('title', TextType::class)
            ->add('parent', null, array(
                'label' => 'Родитель',
                'required' => false,
                'query_builder' => function ($er) use ($id) {
                    $qb = $er->createQueryBuilder('s');
                    if ($id) {
                        $qb->where('s.id <> :id')
                            ->andWhere('s.lvl = 0')
                            ->setParameter('id', $id);
                    }
                    $qb->orderBy('s.root, s.lft', 'ASC');
                    return $qb;
                },
            ))
            ->end()
            ->with("Слайд", array('class' => 'col-md-7'))
            ->add('image', 'sonata_type_model_list',
                array('label' => 'Картинка', 'required' => false),
                array('link_parameters' => array('context' => 'default', '_list_mode' => 'list', 'provider' => 'sonata.media.provider.image')))
            ->add('video', 'sonata_type_model_list',
                array('label' => 'Видео', 'required' => false),
                array('link_parameters' => array('context' => 'default', '_list_mode' => 'list', 'provider' => 'sonata.media.provider.youtube')))
            ->add('slide_title', TextType::class, array('required' => false, 'label' => 'Заголовок слайда'))
            ->add('slide_descr', TextType::class, array('required' => false, 'label' => 'Описание слайда'))
            ->add('button', TextType::class, array('required' => false, 'label' => 'Текст кнопки'))
            ->add('link', TextType::class, array('required' => false, 'label' => 'Ссылка кнопки или слайда'))
            ->end()
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('clone', $this->getRouterIdParameter() . '/clone');
    }

    public function createQuery($context = 'list')
    {
      $em = $this->modelManager->getEntityManager('AppBundle\Entity\Slide');

      $queryBuilder = $em
        ->createQueryBuilder('s')
        ->select('s')
        ->from('AppBundle:Slide', 's')
        ->orderBy('s.root')
        ->addOrderBy('s.parent')
        ->addOrderBy('s.lft')
      ;

      $query = new ProxyQuery($queryBuilder);
      return $query;
    }
}
