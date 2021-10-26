<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/front/office/list", name="front_office_list")
     */
    public function index(): Response
    {
        return $this->render('front_office/list/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }
}
