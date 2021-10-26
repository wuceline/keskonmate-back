<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeasonController extends AbstractController
{
    /**
     * @Route("/front/office/season", name="front_office_season")
     */
    public function index(): Response
    {
        return $this->render('front_office/season/index.html.twig', [
            'controller_name' => 'SeasonController',
        ]);
    }
}
