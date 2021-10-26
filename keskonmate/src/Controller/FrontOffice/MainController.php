<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/front/office/main", name="front_office_main")
     */
    public function index(): Response
    {
        return $this->render('front_office/main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
