<?php

namespace App\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserlistController extends AbstractController
{
    /**
     * @Route("/api/v1/userlist", name="api_v1_userlist")
     */
    public function index(): Response
    {
        return $this->render('api/v1/userlist/index.html.twig', [
            'controller_name' => 'UserlistController',
        ]);
    }
}
