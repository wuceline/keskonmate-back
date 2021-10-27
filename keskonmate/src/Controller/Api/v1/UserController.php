<?php

namespace App\Controller\Api\v1;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/v1/user", name="api_v1_user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function browse(UserRepository $userRepository): Response
    {
        $allUsers = $userRepository->findAll();
        // dd($allUsers);        
        
        return $this->json($allUsers, Response::HTTP_OK, [], ['groups' => 'api_user_read']);
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(int $id, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);
        // dd($allUsers);        
        
        return $this->json($user, Response::HTTP_OK, [], ['groups' => 'api_user_read']);
    }
}
