<?php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CRUDController extends Controller
{
  public function cloneAction()
    {
        $object = $this->admin->getSubject();
        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }
        $clonedObject = clone $object;
        if(method_exists($clonedObject, 'getTitle'))
          $clonedObject->setTitle($object->getTitle()." (Clone)");      
        if(method_exists($clonedObject, 'getComment'))
          $clonedObject->setComment($object->getComment()." (Clone)");
        $this->admin->create($clonedObject);
        $this->addFlash('sonata_flash_success', 'Cloned successfully');
        return new RedirectResponse($this->admin->generateUrl('list'));
    }
}