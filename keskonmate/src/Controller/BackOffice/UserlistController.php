<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserlistController extends AbstractController
{
    /**
     * @Route("/backoffice/userlist", name="_browse")
     */
    public function browse(): Response
    {
        return $this->render('backoffice/userlist/browse.html.twig', [
            'controller_name' => 'UserlistController',
        ]);
    }
}
