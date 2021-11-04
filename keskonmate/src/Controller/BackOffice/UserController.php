<?php

namespace App\Controller\BackOffice;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/users", name="backoffice_users_") 
 */
class UserController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): Response
    {
        return $this->render('backoffice/user/browse.html.twig', [
            'user_list' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Request $request, $id, UserRepository $userRepository): Response
    {       
        $user = $userRepository->find($id); 

        $userForm = $this->createForm(UserType::class, $user, [
            'disabled' => 'disabled'
        ]);

        return $this->render('backoffice/user/read.html.twig', [
            'user_form' => $userForm->createView(),
            'user' => $userForm,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, User $user): Response
    {
        $userForm = $this->createForm(UserType::class, $user);
        $userForm
            ->remove('createdAt')
            ->remove('updatedAt');

        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $user->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', "'{$user->getUserIdentifier()}' a ete mis a jour");

            return $this->redirectToRoute('backoffice_users_browse');
        }

        return $this->render('backoffice/user/add.html.twig', [
            'user_form' => $userForm->createView(),
            'user' => $user,
            'page' => 'edit',
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        //
        $userForm = $this->createForm(UserType::class, $user);
        $userForm
            ->remove('createdAt')
            ->remove('updatedAt');
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();  
            $entityManager->persist($user);
            $entityManager->flush();

            // pour opquast 
            $this->addFlash('success', "'{$user->getUserIdentifier()}' a ete cree");

            // redirection
            return $this->redirectToRoute('backoffice_users_browse');
        }

        return $this->render('backoffice/user/add.html.twig', [
            'user_form' => $userForm->createView(),
            'page' => 'create',
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function delete(User $user, EntityManagerInterface $entityManager): Response
    {
        $this->addFlash('success', "User {$user->getUserIdentifier()} deleted");

        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('backoffice_users_browse');
    }
}
