<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/backoffice/user", name="_browse")
     */
    public function browse(): Response
    {
        return $this->render('backoffice/user/browse.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
