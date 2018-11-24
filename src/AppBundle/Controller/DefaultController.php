<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedbackType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Service\Blocks;

class DefaultController extends Controller
{
  public function level0Action(Request $request){
    return $this->mainAction($request, 0, array(0 => '/'));
  }

  public function level1Action(Request $request, $slug){
    return $this->mainAction($request, 1, array(0 => "/$slug"));
  }

  public function level2Action(Request $request, $slug, $slug_0){
    return $this->mainAction($request, 2,
      array(0 => "/$slug", 1 => $slug_0));
  }

  public function mainAction(Request $request, $level, $slug)
  {

    $em = $this->getDoctrine()->getManager();
    $pages = $em->getRepository("AppBundle:Page")->createQueryBuilder('p')
      ->where('p.path = :path')->setParameter('path', '/');

    if ($level > 0) $pages
      ->orWhere('p.path LIKE :path2')->setParameter('path2', "{$slug[0]}%");

    $pages = $pages->getQuery()->getResult();
    $page = null;

    if (count($pages) == 1) {
      $page = $pages[0];
    } else {
      if ($level == 1) {
        $p_r = null;
        foreach ($pages as $p) {
          if ($p->getPath() == $slug[0]) $page = $p;
          if ($p->getPath() == "/") $p_r = $p;
        }
        if ($page == null) $page = $p_r;
      } elseif ($level == 2) {
        $p_r = $p_all = null;
        foreach ($pages as $p) {
          if ($p->getPath() == "{$slug[0]}/{$slug[1]}") $page = $p;
          if ($p->getPath() == "{$slug[0]}/*") $p_all = $p;
          if ($p->getPath() == "/") $p_r = $p;
        }
        if ($page == null) $page = $p_all;
        if ($page == null) $page = $p_r;
      }
    }

    $blocks = $this->container->get('appbundle.blocks')
      ->loadBlocks($page->getBlocks(), $slug, $level);

    $render = array();
    $render['base_dir'] = realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR;
    $render['page'] = $page;
    $render['blocks'] = $blocks;

    if (isset($blocks['form'])) {
      if (isset($blocks['form']['id'])) {
        $block_form = $this->_loadBlockForm($blocks['form']['id']);
        $render['form'] = $this->_createFeedbackForm(new Feedback(), $block_form);
        // var_dump($render['form']);
        $render['form'] = $render['form']->createView();
      }
    }

    

    return $this->render('AppBundle:Page:home.html.twig', $render);
  }

  private function _loadBlockForm($blockid){
    $block = $this->getDoctrine()->getManager()->find("AppBundle:Block", $blockid);
    $fields = preg_split('/\r\n|\r|\n/', $block->getcusttextattr01());
    $result = array('id' => $blockid);
    foreach ($fields as $key => $value) {
      $field = explode('|', $value);
      $f = array ('title' => $field[0], 'type' => $field[1]);
      if ((count($field) > 2) && ($field[1] == 'choice'))
        $f['choices'] = $field[2];
      $result['fields'][] = $f;
    }
    return $result;
  }

  private function _createFeedbackForm(Feedback $entity, $block_form){
    $form = $this->createForm(FeedbackType::class, $entity, array(
      'action' => $this->generateUrl('feedback_create', array('blockid' => $block_form['id'])),
      'method' => 'POST'
    ));
    
    $style = 'border-radius: 7px; -moz-border-radius: 7px; -webkit-border-radius: 7px;';

    $form->add('submit', 'submit', array(
      'label' => 'Зарегистрироваться',
      'attr' => array (
        'style' => $style."color:#ffffff;background-color:#363064;text-transform:uppercase;",
        'class' => 't-submit'
      )
    ));

    $i = 1;
    foreach ($block_form['fields'] as $key => $value) {
      $style = 'color:#000000;background-color:#ffffff;';
      $n = str_pad($i, 2, 0, STR_PAD_LEFT);      
      $attr = array(
        'class' => 't-input js-tilda-rule',
        'style' => $style,
        'data-tilda-req' => 1,
        'data-tilda-rule' => $value['type'],
        'placeholder' => $value['title'],
        'datatype' => 'text'
      );
      if (($value['type'] == 'text') || ($value['type'] == 'email')) {
        $form->add("field$n", TextType::class, array('attr' => $attr));
      }
      if ($value['type'] == 'phone') {
        $attr['class'] = 't-input js-tilda-rule js-tilda-mask';
        $attr['data-tilda-mask'] = '+7 (999) 999-99-99';
        $form->add("field$n", TextType::class, array('attr' => $attr));
      }
      if ($value['type'] == 'choice') {
        $attr['datatype'] = 'choice';
        $c = explode(',', $value['choices']);
        $choices = array();
        foreach ($c as $choice) $choices[$choice] = $choice;
        $form->add("field$n", ChoiceType::class,
          array('attr' => $attr, 'choices' => $choices));
      }
      $i++;
    }
    return $form;
  }

  public function createAction(Request $request, $blockid)
  {
    $entity = new Feedback();
    $block_form = $this->_loadBlockForm($blockid);
    $form = $this->_createFeedbackForm($entity, $block_form);
    $form->handleRequest($request);    
    $res = 'error';

    if ($form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($entity);
      $em->flush();
      $res = 'success';
    }

    $response = new Response();
    $response->setContent(json_encode(array(
      'data' => $res,
    )));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }
}
