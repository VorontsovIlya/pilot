<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChertovskayaController extends Controller
{
    public function defaultAction(Request $request)
    {
        return $this->render('AppBundle:Page:chertovskaya.html.twig');
    }
}
