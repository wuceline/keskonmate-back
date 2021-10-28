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
 * @Route("/backoffice/actors", name="backoffice_actor_") 
 */
class ActorController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(ActorRepository $actorRepository): Response
    {
        return $this->render('backoffice/actor/browse.html.twig', [
            'actor_list' => $actorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Request $request, $id, ActorRepository $actorRepository): Response
    {       
        $actor = $actorRepository->findOneWithInfosDQL($id); 

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
     */
    public function edit(Request $request, Actor $actor): Response
    {
        $actorForm = $this->createForm(ActorType::class, $actor);

        $actorForm->handleRequest($request);

        if ($actorForm->isSubmitted() && $actorForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $actor->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', "Actor `{$actor->getFirstname()}` `{$actor->getLastname()}` udpated successfully");

            return $this->redirectToRoute('backoffice_actor_browse');
        }

        return $this->render('backoffice/actor/add.html.twig', [
            'actor_form' => $actorForm->createView(),
            'actor' => $actor,
            'page' => 'edit',
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actor = new Actor();

        $actorForm = $this->createForm(ActorType::class, $actor);
        $actorForm->handleRequest($request);

        if ($actorForm->isSubmitted() && $actorForm->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();  
            $entityManager->persist($actor);
            $entityManager->flush();

            // pour opquast 
            $this->addFlash('success', "Actor `{$actor->getFirstname()}` `{$actor->getLastname()}` created successfully");

            // redirection
            return $this->redirectToRoute('backoffice_actor_browse');
        }

        return $this->render('backoffice/actor/add.html.twig', [
            'actor_form' => $actorForm->createView(),
            'page' => 'create',
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function delete(Actor $actor, EntityManagerInterface $entityManager): Response
    {
        $this->addFlash('success', "Actor {$actor->getId()} deleted");

        $entityManager->remove($actor);
        $entityManager->flush();

        return $this->redirectToRoute('backoffice_actor_browse');
    }
}
