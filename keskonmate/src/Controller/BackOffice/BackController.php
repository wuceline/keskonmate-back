<?php

namespace App\Controller\BackOffice;

use App\Repository\SeriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice", name="backoffice_") 
 */
class BackController extends AbstractController
{
    /**
     * @Route("", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('backoffice/homeorder/browse.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }

    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(SeriesRepository $seriesRepository): Response
    {
        return $this->render('backoffice/homeorder/browse.html.twig', [
            'allseries' => $seriesRepository->findAll(),
        ]);
    }
}