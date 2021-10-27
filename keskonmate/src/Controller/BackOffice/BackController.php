<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackController extends AbstractController
{
    /**
     * @Route("/backoffice/back", name="_browse")
     */
    public function browse(): Response
    {
        return $this->render('backoffice/back/browse.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }
}