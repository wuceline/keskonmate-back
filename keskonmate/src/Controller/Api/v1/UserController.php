<?php

namespace App\Controller\Api\v1;

use App\Entity\User;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


/**
 * @Route("/api/v1/users", name="api_v1_users_")
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
        
        return $this->json($allUsers, Response::HTTP_OK, [], ['groups' => 'api_users_browse']);
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(int $id, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);
        
        return $this->json($user, Response::HTTP_OK, [], ['groups' => 'api_users_read']);
    }

    /**
     * @Route("/{id}", name="edit", methods={"PATCH"}, requirements={"id"="\d+"})
     */
    public function edit(int $id, UserRepository $userRepository, Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = $userRepository->find($id);

        if (is_null($userRepository)) {
            return $this->getNotFoundResponse();
        }

        $user->setUpdatedAt(new DateTimeImmutable());
        
        $clearPassword = $request->toArray()['password'];
        if (! empty($request->toArray()['password'])) {
            $hashedPassword = $passwordHasher->hashPassword($user, $clearPassword);
            
            $user->setPassword($hashedPassword);
            dump($request->toArray());
            //dd((object)$user);

        $serializer->deserialize($user, User::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $user]);    
        }
        // dd($user);
        $errors = $validator->validate($user);
    
        if(count($errors) > 0) {
            $reponseAsArray = [
                'error' => true,
                'message' => $errors,
            ];
            
            return $this->json($reponseAsArray, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    
        $entityManager->persist($user);
        $entityManager->flush();
        $responseAsArray = [
             'message' => 'Utilisateur mis a jour',
             'id' => $user->getId(),
        ];
 
         return $this->json($responseAsArray, Response::HTTP_CREATED);
    }

    /**
     * @Route("/", name="add", methods={"POST"})
     */
    public function add(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $jsonContent = $request->getContent();        
        dd(json_decode($jsonContent));
        $user = $serializer->deserialize($jsonContent, User::class, 'json');
        dd($user);
        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            $responseAsArray = [
                'error' => true,
                'message' => $errors,
            ];
            return $this->json($responseAsArray, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        // dd($user);
        $clearPassword = $user;
        if (! empty($clearPassword)) {
            $hashedPassword = $passwordHasher->hashPassword($user, $clearPassword);
            $user->setPassword($hashedPassword);
        }

        $entityManager->persist($user);
        $entityManager->flush();
        $responseAsArray = [
            'message' => 'User created',
            'id' => $user->getId(),
        ];

        return $this->json($responseAsArray, Response::HTTP_CREATED);
    }

     /**
     * @Route("/{id}", name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
 /*   public function delete(int $id, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        $user = $userRepository->find($id);

        if (is_null($user)) {
            return $this->getNotFoundResponse();
        }
        $entityManager->remove($user);
        $entityManager->flush();
        
        $reponseAsArray = [
            'message' => 'User supprimé',
            'id' => $id
        ];

        return $this->json($reponseAsArray);
    } */

    

    private function getNotFoundResponse() {

        $responseArray = [
            'error' => true,
            'userMessage' => 'Ressource non trouvé',
            'internalMessage' => 'Cet utilisateur n\'existe pas dans la BDD',
        ];

        return $this->json($responseArray, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
