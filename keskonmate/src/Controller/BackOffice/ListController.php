<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/back/office/list", name="back_office_list")
     */
    public function index(): Response
    {
        return $this->render('back_office/list/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }
}
