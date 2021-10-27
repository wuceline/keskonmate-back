<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    /**
     * @Route("/backoffice/genre", name="_browse")
     */
    public function browse(): Response
    {
        return $this->render('backoffice/genre/browse.html.twig', [
            'controller_name' => 'GenreController',
        ]);
    }
}
