<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/front/office/actor", name="front_office_actor")
     */
    public function index(): Response
    {
        return $this->render('front_office/actor/index.html.twig', [
            'controller_name' => 'ActorController',
        ]);
    }
}
