<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedbackType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
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

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }

        $response = new Response();
        $response->setContent(json_encode(array(
            'data' => 'success',
        )));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}
