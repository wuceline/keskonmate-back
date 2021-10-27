<?php

namespace App\Controller\Api\v1;

use App\Repository\SeriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/series", name="api_v1_series")
 */
class SeriesController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(SeriesRepository $seriesRepository): Response
    {
        $allSeries = $seriesRepository->findAll();
        // dd($allActors);
        
        return $this->json($allSeries);
    }
}

