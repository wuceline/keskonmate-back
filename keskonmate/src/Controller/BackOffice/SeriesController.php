<?php

namespace App\Controller\BackOffice;

use App\Entity\Series;
use App\Form\SeriesType;
use App\Repository\SeriesRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/series", name="backoffice_series_") 
 */
class SeriesController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(SeriesRepository $seriesRepository): Response
    {
        return $this->render('backoffice/series/browse.html.twig', [
            'series_list' => $seriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Request $request, $id, SeriesRepository $seriesRepository): Response
    {       
        $series = $seriesRepository->find($id); 

        $seriesForm = $this->createForm(SeriesType::class, $series, [
            'disabled' => 'disabled'
        ]);

        return $this->render('backoffice/series/read.html.twig', [
            'series_form' => $seriesForm->createView(),
            'series' => $seriesForm,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Series $series): Response
    {
        $seriesForm = $this->createForm(SeriesType::class, $series);
        $seriesForm
            ->remove('createdAt')
            ->remove('updatedAt');

        $seriesForm->handleRequest($request);

        if ($seriesForm->isSubmitted() && $seriesForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $series->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', "Series` {$series->getTitle()}` udpated successfully");

            return $this->redirectToRoute('backoffice_series_browse');
        }

        return $this->render('backoffice/series/add.html.twig', [
            'series_form' => $seriesForm->createView(),
            'series' => $series,
            'page' => 'edit',
        ]);
    }

    /**
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $series = new Series();

        $seriesForm = $this->createForm(SeriesType::class, $series);
        $seriesForm->handleRequest($request);

        if ($seriesForm->isSubmitted() && $seriesForm->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();  
            $entityManager->persist($series);
            $entityManager->flush();

            // pour opquast 
            $this->addFlash('success', "Series` {$series->getTitle()}` created successfully");

            // redirection
            return $this->redirectToRoute('backoffice_series_browse');
        }

        return $this->render('backoffice/series/add.html.twig', [
            'series_form' => $seriesForm->createView(),
            'page' => 'create',
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function delete(Series $series, EntityManagerInterface $entityManager): Response
    {
        $this->addFlash('success', "Series {$series->getTitle()} deleted");

        $entityManager->remove($series);
        $entityManager->flush();

        return $this->redirectToRoute('backoffice_series_browse');
    }
}
