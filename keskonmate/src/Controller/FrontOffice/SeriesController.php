<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{
    /**
     * @Route("/front/office/series", name="front_office_series")
     */
    public function index(): Response
    {
        return $this->render('front_office/series/index.html.twig', [
            'controller_name' => 'SeriesController',
        ]);
    }
}
