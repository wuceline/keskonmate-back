<?php

namespace App\Controller\BackOffice;

use App\Entity\Actor;
use App\Form\ActorType;
use App\Repository\ActorRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/actors", name="backoffice_actors_") 
 */
class ActorController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     * 
     * @IsGranted("ROLE_CATALOGUE_MANAGER")
     */
    public function browse(ActorRepository $actorRepository): Response
    {
        return $this->render('backoffice/actor/browse.html.twig', [
            'actor_list' => $actorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     * 
     * @IsGranted("ROLE_CATALOGUE_MANAGER")
     */
    public function read(Request $request, $id, ActorRepository $actorRepository): Response
    {       
        $actor = $actorRepository->find($id); 

        $actorForm = $this->createForm(ActorType::class, $actor, [
            'disabled' => 'disabled'
        ]);

        return $this->render('backoffice/actor/read.html.twig', [
            'actor_form' => $actorForm->createView(),
            'actor' => $actorForm,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     * 
     *@IsGranted("ROLE_ADMIN") 
     */
    public function edit(Request $request, Actor $actor): Response
    {
        $actorForm = $this->createForm(ActorType::class, $actor);
        $actorForm
            ->remove('createdAt')
            ->remove('updatedAt');
        $actorForm->handleRequest($request);

        if ($actorForm->isSubmitted() && $actorForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $actor->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', "'{$actor->getName()}' a ete mis a jour");

            return $this->redirectToRoute('backoffice_actors_browse');
        }

        return $this->render('backoffice/actor/add.html.twig', [
            'actor_form' => $actorForm->createView(),
            'actor' => $actor,
            'page' => 'edit',
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET", "POST"})
     * 
     * @IsGranted("ROLE_ADMIN") 
     */
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actor = new Actor();
        $actor->setCreatedAt(new DateTimeImmutable());

        $actorForm = $this->createForm(ActorType::class, $actor);
        $actorForm
            ->remove('createdAt')
            ->remove('updatedAt');
        $actorForm->handleRequest($request);

        if ($actorForm->isSubmitted() && $actorForm->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();  
            $entityManager->persist($actor);
            $entityManager->flush();

            // pour opquast 
            $this->addFlash('success', "'{$actor->getName()}' a ete cree");

            // redirection
            return $this->redirectToRoute('backoffice_actors_browse');
        }

        return $this->render('backoffice/actor/add.html.twig', [
            'actor_form' => $actorForm->createView(),
            'page' => 'create',
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"GET"}, requirements={"id"="\d+"})
     * 
     * @IsGranted("ROLE_ADMIN") 
     */
    public function delete(Actor $actor, EntityManagerInterface $entityManager): Response
    {
        $this->addFlash('success', "Actor {$actor->getId()} deleted");

        $entityManager->remove($actor);
        $entityManager->flush();

        return $this->redirectToRoute('backoffice_actors_browse');
    }
}
