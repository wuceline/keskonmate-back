<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{
    /**
     * @Route("/backoffice/series", name="_browse")
     */
    public function browse(): Response
    {
        return $this->render('backoffice/series/browse.html.twig', [
            'controller_name' => 'SeriesController',
        ]);
    }
}
