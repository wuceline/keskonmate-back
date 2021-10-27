<?php

namespace App\Controller\Api\v1;

use App\Repository\UserListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/userlist", name="api_v1_userlist")
 */
class UserlistController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(UserListRepository $userlistRepository): Response
    {
        $allUserlists = $userlistRepository->findAll();
        // dd($allActors);
        
        return $this->json($allUserlists, Response::HTTP_OK);
    }
}
