<?php

namespace App\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/api/v1/actor", name="api_v1_actor")
     */
    public function index(): Response
    {
        return $this->render('api/v1/actor/index.html.twig', [
            'controller_name' => 'ActorController',
        ]);
    }
}
