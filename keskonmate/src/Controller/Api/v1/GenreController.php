<?php

namespace App\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    /**
     * @Route("/api/v1/genre", name="api_v1_genre")
     */
    public function index(): Response
    {
        return $this->render('api/v1/genre/index.html.twig', [
            'controller_name' => 'GenreController',
        ]);
    }
}
