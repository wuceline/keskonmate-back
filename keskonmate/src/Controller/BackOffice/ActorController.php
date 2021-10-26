<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/back/office/actor", name="back_office_actor")
     */
    public function index(): Response
    {
        return $this->render('back_office/actor/index.html.twig', [
            'controller_name' => 'ActorController',
        ]);
    }
}
