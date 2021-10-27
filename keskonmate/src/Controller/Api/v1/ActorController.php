<?php

namespace App\Controller\Api\v1;

use App\Repository\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/v1/actors", name="api_v1_actor")
 */
class ActorController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(ActorRepository $actorRepository): Response
    {
        $allActors = $actorRepository->findAll();
        dd($allActors);
        
        return $this->json($allActors, Response::HTTP_OK);
    }
}
