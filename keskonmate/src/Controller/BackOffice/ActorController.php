<?php

namespace App\Controller\BackOffice;

use App\Entity\Actor;
use App\Repository\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/backoffice/actor", name="_browse", methods={"GET"})
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
    public function read(Request $request, Actor $actor): Response
    {        
        $actorForm = $this->createForm(ActorType::class, $actor, [
            'disabled' => 'disabled'
        ]);
                
        return $this->render('backoffice/actor/read.html.twig', [
            'category_form' => $actorForm->createView(),
            'category' => $actorForm,
        ]);
    }
}
