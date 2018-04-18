<?php

namespace MaPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('@MaPage/Default/index.html.twig');
    }
}
