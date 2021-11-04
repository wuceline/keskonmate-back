<?php

namespace App\Controller\BackOffice;

use App\Entity\Series;
use App\Form\HomeOrderType;
use App\Form\SeriesType;
use App\Repository\SeriesRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice", name="backoffice_") 
 */
class BackController extends AbstractController
{
    // /**
    //  * @Route("", name="homepage", methods={"GET"})
    //  */
    // public function index(SeriesRepository $seriesRepository): Response
    // {
    //     $homeOrderAll = $seriesRepository->findAllByHomeOrder();
    //     $seriesList = $seriesRepository->findAllWithIdTitleAndHomeOrder();

    //     $homeOrderForm = $this->createForm(HomeOrderType::class, $seriesList, [
    //         'disabled' => 'disabled'
    //     ]);

    //     return $this->render('backoffice/homeorder/browse.html.twig', [
    //         'series_homeOrder' => $homeOrderAll,
    //         'series_list' => $seriesList,
    //         'series_form' => $homeOrderForm->createView(),
    //     ]);
    // }  

    /**
     * @Route("", name="homepage", methods={"GET", "PATCH"}, requirements={"id"="\d+"}))
     */
    public function index(Request $request, Series $series, SeriesRepository $seriesRepository): Response
    {
        
        $seriesList = $seriesRepository->findAllWithIdTitleAndHomeOrder();

        $seriesForm = $this->createForm(SeriesType::class, $series);

        $seriesForm->handleRequest($request);

        if ($seriesForm->isSubmitted() && $seriesForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $series->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', "Series` {$series->getTitle()}` udpated successfully");

            return $this->redirectToRoute('backoffice_homepage');
        }


        return $this->render('backoffice/homeorder/browse.html.twig', [
            'series_list' => $seriesList,
        ]);
    } 

    // /**
    //  * @Route("/{id}", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
    //  */
    // public function edit(Request $request, Series $series): Response
    // {
    //     $seriesForm = $this->createForm(SeriesType::class, $series);

    //     $seriesForm->handleRequest($request);

    //     if ($seriesForm->isSubmitted() && $seriesForm->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
            
    //         $series->setUpdatedAt(new DateTimeImmutable());
    //         $entityManager->flush();

    //         $this->addFlash('success', "Series` {$series->getTitle()}` udpated successfully");

    //         return $this->redirectToRoute('backoffice_homepage');
    //     }

    //     return $this->render('backoffice/series/add.html.twig', [
    //         'series_form' => $seriesForm->createView(),
    //         'series' => $series,
    //         'page' => 'edit',
    //     ]);
    // }
}