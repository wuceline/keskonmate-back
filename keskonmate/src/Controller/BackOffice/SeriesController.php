<?php

namespace App\Controller\BackOffice;

use App\Entity\Series;
use App\Form\SeriesType;
use App\Repository\SeriesRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
     * 
     * @Security("is_granted('ROLE_CATALOGUE_MANAGER') or is_granted('ROLE_ADMIN')")
     */

    public function browse(SeriesRepository $seriesRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $data = $seriesRepository->findBy([],['title' => 'asc']);

        $series = $paginator->paginate(
            $data, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            20 // Nombre de résultats par page
        );

        $formSearchBar = $this->createFormBuilder(null)
            ->add('Rechercher', TextType::class)
            ->add('_', EntityType::class, [
                'class' => Series::class
                ])
            ->add('Soumettre', SubmitType::class, [
                'attr' => [
                    'btn btn-primary'
                ]
            ])
            ->getForm();

        return $this->render('backoffice/series/browse.html.twig', [
            'series' => $series,
            'searchBar' => $formSearchBar->createView()
        ]);
    }

    /**
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     * 
     * @Security("is_granted('ROLE_CATALOGUE_MANAGER') or is_granted('ROLE_ADMIN')")
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
     * 
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_SUPER_ADMIN')")
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

            $this->addFlash('success', "'{$series->getTitle()}' a été mis à jour");

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
     * 
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_SUPER_ADMIN')")
     */
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $series = new Series();
        $series->setCreatedAt(new DateTimeImmutable());
        $seriesForm = $this->createForm(SeriesType::class, $series);
        $seriesForm
            ->remove('createdAt')
            ->remove('updatedAt');
        $seriesForm->handleRequest($request);

        if ($seriesForm->isSubmitted() && $seriesForm->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();  
            $entityManager->persist($series);
            $entityManager->flush();

            // pour opquast 
            $this->addFlash('success', "'{$series->getTitle()}' a ete cree");

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
     * 
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_SUPER_ADMIN')")
     */
    public function delete(Series $series, EntityManagerInterface $entityManager): Response
    {
        $this->addFlash('success', "Series {$series->getTitle()} deleted");

        $entityManager->remove($series);
        $entityManager->flush();

        return $this->redirectToRoute('backoffice_series_browse');
    }
}
