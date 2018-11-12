<?php

namespace MenuBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;

class MenuAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $subject = $this->getSubject();
        $id = $subject->getId();

        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

        $choices = array();

        $news = $em->getRepository("AppBundle:News")->createQueryBuilder('n')
            ->where('n.public = :public')->setParameter('public', true)
            ->orderBy('n.path', 'DESC')->getQuery()->getResult();

        foreach ($news as $n) {
            $choices['/news/'.$n->getPath()] = '/news/'.$n->getPath();
        }

        $formMapper
          ->with("Настройка", array('class' => 'col-md-7'))
            ->add('title', TextType::class, array())
            ->add('route', TextType::class, array('required' => false))
            ->add('route_choice', ChoiceType::class, array(
              'choices' => $choices,
              'required' => false
            ))
            ->add('alias', TextType::class, array('required' => false))
            ->add('static', null, array('required' => false))
            ->add('parent', null, array(
                'label' => 'Родитель',
                'required' => false,
                'query_builder' => function($er) use ($id) {
                    $qb = $er->createQueryBuilder('p');
                    if ($id) {
                        $qb->where('p.id <> :id')
                           ->andWhere('p.lvl = 0')
                           ->setParameter('id', $id);
                    }
                    $qb->orderBy('p.root, p.lft', 'ASC');
                    return $qb;
                }
            ))
          ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array())
            ->add('id', null, array())
            ->add('route', null, array())
        ;
    }

    public function configureShowField(ShowMapper $showMapper){
        $showMapper
            ->add('title', null, array())
            ->add('id', null, array())
            ->add('route', null, array())
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('up', 'text', array('template' => 'MenuBundle:admin:field_tree_up.html.twig', 'label'=>' '))
            ->add('down', 'text', array('template' => 'MenuBundle:admin:field_tree_down.html.twig', 'label'=>' '))
            ->add('id', null)
            ->addIdentifier('laveled_title', null, array('sortable'=>false, 'label'=>'Пункт меню'))
            ->add('route', null)
            ->add('menuTypeId', 'entity', array(
                    'class'=>'MenuBundle:MenuType',
                    'property'=>'title'
                )
            )
        ;
    }

    public function createQuery($context = 'list')
    {
      $em = $this->modelManager->getEntityManager('MenuBundle\Entity\Menu');

      $queryBuilder = $em
        ->createQueryBuilder('menu')
        ->select('menu')
        ->from('MenuBundle:Menu', 'menu')
        ->orderBy('menu.root')
        ->addOrderBy('menu.parent')
        ->addOrderBy('menu.lft')
      ;

      $query = new ProxyQuery($queryBuilder);
      return $query;
    }

}