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
    public function index(SeriesRepository $seriesRepository): Response
    {
        $homeOrder = $seriesRepository->findAllByHomeOrder();
        $seriesList = $seriesRepository->findAllWithTitleandHomeOrder();

        return $this->render('backoffice/homeorder/browse.html.twig', [
            'series_homeOrder' => $homeOrder,
            'series_list' => $seriesList,
        ]);
    }  
}