<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    /**
     * @Route("/front/office/genre", name="front_office_genre")
     */
    public function index(): Response
    {
        return $this->render('front_office/genre/index.html.twig', [
            'controller_name' => 'GenreController',
        ]);
    }
}
