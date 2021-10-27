<?php

namespace App\Controller\Api\v1;

use App\Repository\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/v1/actor", name="api_v1_actor")
 */
class ActorController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(ActorRepository $actorRepository): Response
    {
        $allActors = $actorRepository->findAll();
        // dd($allActors);
        
        return $this->json($allActors, Response::HTTP_OK);
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(int $id, ActorRepository $actorRepository): Response
    {
        $actor = $actorRepository->find($id);

        return $this->json($actor, Response::HTTP_OK);
    }
}
