<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    /**
     * @Route("/back/office/genre", name="back_office_genre")
     */
    public function index(): Response
    {
        return $this->render('back_office/genre/index.html.twig', [
            'controller_name' => 'GenreController',
        ]);
    }
}
