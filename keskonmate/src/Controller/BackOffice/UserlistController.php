<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserlistController extends AbstractController
{
    /**
     * @Route("/back/office/userlist", name="back_office_userlist")
     */
    public function index(): Response
    {
        return $this->render('back_office/userlist/index.html.twig', [
            'controller_name' => 'UserlistController',
        ]);
    }
}
