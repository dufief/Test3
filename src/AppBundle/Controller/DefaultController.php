<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, $email)
    {
        /* verifier si il est admin*/
        $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN');
        /* or */
        $this->isGranted('ROLE_ADMIN');


        $this->denyAccessUnlessGranted('ROLE_ADMIN',$this->getUser(),'Vous n\'avez pas le droit');

       /* creer un admin */
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserByEmail($email);
        if(!user) {
            $user = $userManager->createUser();
        }
        $user->addRole("ROLE_ADMIN");



        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
