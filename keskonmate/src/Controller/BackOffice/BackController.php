<?php

namespace App\Controller\BackOffice;

use App\Entity\Series;
use App\Form\HomeOrderType;
use App\Form\SeriesType;
use App\Repository\SeriesRepository;
use DateTimeImmutable;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice", name="backoffice_") 
 */
class BackController extends AbstractController
{
    /**
     * @Route("", name="homepage", methods={"GET"})
     * 
     * @Security("is_granted('ROLE_CATALOGUE_MANAGER') or is_granted('ROLE_ADMIN')")
     */
    public function index(SeriesRepository $seriesRepository): Response
    {
        $homeOrderAll = $seriesRepository->findAllByHomeOrder();
        $seriesList = $seriesRepository->findAllByHomeOrder();
        $homeOrderForm = $this->createForm(HomeOrderType::class, $seriesList, [
            'disabled' => 'disabled'
        ]);

        return $this->render('backoffice/homeorder/browse.html.twig', [
            'series_homeOrder' => $homeOrderAll,
            'series_list' => $seriesList,
            'series_form' => $homeOrderForm->createView(),
        ]);
    }      

    /**
     * @Route("/{id}", name="edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     * 
     * @Security("is_granted('ROLE_CATALOGUE_MANAGER') or is_granted('ROLE_ADMIN')")
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
            try{
                $entityManager->flush();
            } catch (Exception $e) {
                $this->addFlash('danger', "Cet emplacement est deja pris");
                return $this->redirectToRoute('backoffice_homepage');
            }

            $this->addFlash('success', "'{$series->getTitle()}' a ete ajoute a la liste");

            return $this->redirectToRoute('backoffice_homepage');
        }

        return $this->render('backoffice/series/add.html.twig', [
            'series_form' => $seriesForm->createView(),
            'series' => $series,
            'page' => 'edit',
        ]);
    }
}