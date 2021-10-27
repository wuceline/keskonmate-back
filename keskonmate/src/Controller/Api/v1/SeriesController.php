<?php

namespace App\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{
    /**
     * @Route("/api/v1/series", name="api_v1_series")
     */
    public function index(): Response
    {
        return $this->render('api/v1/series/index.html.twig', [
            'controller_name' => 'SeriesController',
        ]);
    }
}
