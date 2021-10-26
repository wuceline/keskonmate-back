<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/back/office/user", name="back_office_user")
     */
    public function index(): Response
    {
        return $this->render('back_office/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
