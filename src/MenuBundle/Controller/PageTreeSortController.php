<?php

namespace MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class PageTreeSortController extends Controller
{
    // /**
    // * @Secure(roles="ROLE_SUPER_ADMIN")
    // */
    public function upAction($page_id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('MenuBundle:Menu');
        $page = $repo->findOneById($page_id);
        if ($page->getParent()){
            $repo->moveUp($page);
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    public function getRequest()
    { 
      return $this->container->get('request_stack')->getCurrentRequest();
    }

    // /**
    // * @Secure(roles="ROLE_SUPER_ADMIN")
    // */
    public function downAction($page_id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('MenuBundle:Menu');
        $page = $repo->findOneById($page_id);
        if ($page->getParent()){
            $repo->moveDown($page);
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
}