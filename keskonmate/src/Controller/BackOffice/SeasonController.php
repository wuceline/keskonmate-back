<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeasonController extends AbstractController
{
    /**
     * @Route("/backoffice/season", name="_browse")
     */
    public function browse(): Response
    {
        return $this->render('backoffice/season/browse.html.twig', [
            'controller_name' => 'SeasonController',
        ]);
    }
}
