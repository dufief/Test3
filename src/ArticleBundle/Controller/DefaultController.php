<?php

namespace ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /*public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repAuteur = $em->getRepository('ArticleBundle:Mangas');

        $article = $repAuteur->findAll();

        $vars['articles'] = $article;


        return $this->render('@Article/Default/index.html.twig', $vars);
    }*/

    public function indexAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM ArticleBundle:Mangas a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );
        $vars['articles'] = $pagination;

        // parameters to template
        return $this->render('@Article/Default/index.html.twig', $vars);
    }

    public function maintenanceAction()
    {
        return $this->render('@Article/Default/maintenance.html.twig');
    }
}
