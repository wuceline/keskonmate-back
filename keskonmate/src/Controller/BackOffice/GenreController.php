<?php

namespace App\Controller\BackOffice;

use App\Entity\Genre;
use App\Repository\GenreRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/genres", name="backoffice_genre_") 
 */
class GenreController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(GenreRepository $genreRepository): Response
    {
        return $this->render('backoffice/genre/browse.html.twig', [
            'genre_list' => $genreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Request $request, $id, GenreRepository $genreRepository): Response
    {       
        $genre = $genreRepository->findOneWithInfosDQL($id); 

        $genreForm = $this->createForm(GenreType::class, $genre, [
            'disabled' => 'disabled'
        ]);

        return $this->render('backoffice/genre/read.html.twig', [
            'genre_form' => $genreForm->createView(),
            'genre' => $genreForm,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Genre $genre): Response
    {
        $genreForm = $this->createForm(GenreType::class, $genre);

        $genreForm->handleRequest($request);

        if ($genreForm->isSubmitted() && $genreForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $genre->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', "Genre `{$genre->getName()}` udpated successfully");

            return $this->redirectToRoute('backoffice_genre_browse');
        }

        return $this->render('backoffice/genre/add.html.twig', [
            'genre_form' => $genreForm->createView(),
            'genre' => $genre,
            'page' => 'edit',
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $genre = new Genre();

        $genreForm = $this->createForm(GenreType::class, $genre);
        $genreForm->handleRequest($request);

        if ($genreForm->isSubmitted() && $genreForm->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();  
            $entityManager->persist($genre);
            $entityManager->flush();

            // pour opquast 
            $this->addFlash('success', "Genre `{$genre->getName()}` created successfully");

            // redirection
            return $this->redirectToRoute('backoffice_actor_browse');
        }

        return $this->render('backoffice/genre/add.html.twig', [
            'genre_form' => $genreForm->createView(),
            'page' => 'create',
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function delete(Genre $genre, EntityManagerInterface $entityManager): Response
    {
        $this->addFlash('success', "Genre {$genre->getId()} deleted");

        $entityManager->remove($genre);
        $entityManager->flush();

        return $this->redirectToRoute('backoffice_genre_browse');
    }
}
