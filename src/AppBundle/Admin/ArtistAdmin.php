<?php
namespace AppBundle\Admin;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;

class ArtistAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('up', 'text', array('template' => 'AppBundle:admin:field_artist_up.html.twig', 'label'=>' '))
            ->add('down', 'text', array('template' => 'AppBundle:admin:field_artist_down.html.twig', 'label'=>' '))
            ->addIdentifier('id')
            ->addIdentifier('laveled_title', null, array('sortable'=>false, 'label'=>'Пункт меню'))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {

        $subject = $this->getSubject();
        $id = $subject->getId();

        $formMapper
            ->with("Страница", array('class' => 'col-md-7'))
                ->add('title', TextType::class, array('required' => true, 'label' => 'Название'))
                ->add('path', TextType::class, array('required' => true, 'label' => 'Адрес'))
                // ->add('route', TextType::class, array('required' => false, 'label' => 'Постер'))
                
                ->add('page_title', TextType::class, array('required' => true, 'label' => 'SEO - Заголовок'))
                ->add('page_description', TextType::class, array('required' => true, 'label' => 'SEO - Описание'))
                ->add('page_keywords', TextType::class, array('required' => true, 'label' => 'SEO - Ключевые слова'))            
            ->end()

            ->with("Картинки", array('class' => 'col-md-5'))
                ->add('image', 'sonata_type_model_list', array('required' => false, 'label' => 'Картинка, на главную (860x550)'),
                    array('link_parameters' => array('context' => 'artist', 'hide_context' => true)))
                ->add('poster', 'sonata_type_model_list', array('required' => false, 'label' => 'Картинка, на страницу артиста (960x680)'),
                    array('link_parameters' => array('context' => 'artist', 'hide_context' => true)))
                ->add('poster_sq', 'sonata_type_model_list', array('required' => false, 'label' => 'Картинка, на страницу артистов (500x500)'),
                    array('link_parameters' => array('context' => 'artist', 'hide_context' => true)))
                ->add('slides01', 'sonata_type_model',
                    array('multiple' => true, 'by_reference' => false, 'btn_add' => true,
                        'label' => 'Слайды (нижняя часть)', 'required' => false))
            ->end()   

            ->with("Артист", array('class' => 'col-md-7'))
                ->add('content', CKEditorType::class, array(
                    'label' => 'Содержание', 'config_name' => 'default', 'required' => false))
            ->end()

            ->with("Социальные сети", array('class' => 'col-md-5'))
                ->add('social_fb', null, array('required' => false, 'label' => 'Facebook'))
                ->add('social_vk', null, array('required' => false, 'label' => 'VK'))
                ->add('social_ytube', null, array('required' => false, 'label' => 'YouTube'))
                ->add('social_inst', null, array('required' => false, 'label' => 'Instagram'))
            ->end()
            
            ->with("Настройка", array('class' => 'col-md-5'))
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

    public function createQuery($context = 'list')
    {
      $em = $this->modelManager->getEntityManager('AppBundle\Entity\Artist');

      $queryBuilder = $em
        ->createQueryBuilder('a')
        ->select('a')
        ->from('AppBundle:Artist', 'a')
        ->orderBy('a.root')
        ->addOrderBy('a.parent')
        ->addOrderBy('a.lft')
      ;

      $query = new ProxyQuery($queryBuilder);
      return $query;
    }
}
