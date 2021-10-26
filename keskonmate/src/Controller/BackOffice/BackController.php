<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackController extends AbstractController
{
    /**
     * @Route("/back/office/back", name="back_office_back")
     */
    public function index(): Response
    {
        return $this->render('back_office/back/index.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }
}
