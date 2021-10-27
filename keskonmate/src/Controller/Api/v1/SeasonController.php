<?php

namespace App\Controller\Api\v1;

use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/season", name="api_v1_genres")
 */
class SeasonController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(SeasonRepository $seasonRepository): Response
    {
        $allSeasons = $seasonRepository->findAll();
        // dd($allActors);
        
        return $this->json($allSeasons);
    }
}
