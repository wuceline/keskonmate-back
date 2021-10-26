<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{
    /**
     * @Route("/back/office/series", name="back_office_series")
     */
    public function index(): Response
    {
        return $this->render('back_office/series/index.html.twig', [
            'controller_name' => 'SeriesController',
        ]);
    }
}
