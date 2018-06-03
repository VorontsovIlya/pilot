<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedbackType;

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
    
    return $this->render('AppBundle:Page:home.html.twig', [
      'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
      'page' => $page,
      'blocks' => $blocks,
      'form' => $this->createCreateForm(new Feedback())->createView()
    ]);
  }













    // /**
    //  * @Route("/", name="homepage")
    //  */
    public function indexAction(Request $request)
    {
        $entity = new Feedback();
        $form = $this->createCreateForm($entity);

        return $this->render('AppBundle:Page:event.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'entity' => $entity,
            'form' => $form->createView()
        ]);
    }

    private function createCreateForm(Feedback $entity){
        $form = $this->createForm(FeedbackType::class, $entity, array(
            'action' => $this->generateUrl('feedback_create'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Зарегистрироваться'));

        return $form;
    }

    public function createAction(Request $request)
    {
        $entity = new Feedback();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        // if ($form->isValid()) {
        //     $em = $this->getDoctrine()->getManager();
        //     $em->persist($entity);
        //     $em->flush();
        // }

        $response = new Response();
        $response->setContent(json_encode(array(
            'data' => 'success',
        )));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}
