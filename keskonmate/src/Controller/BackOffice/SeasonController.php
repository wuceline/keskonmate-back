<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeasonController extends AbstractController
{
    /**
     * @Route("/back/office/season", name="back_office_season")
     */
    public function index(): Response
    {
        return $this->render('back_office/season/index.html.twig', [
            'controller_name' => 'SeasonController',
        ]);
    }
}
