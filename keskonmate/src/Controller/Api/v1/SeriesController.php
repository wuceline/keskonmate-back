<?php

namespace App\Controller\Api\v1;

use App\Entity\Series;
use App\Repository\SeriesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/v1/series", name="api_v1_series_")
 */
class SeriesController extends AbstractController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(SeriesRepository $seriesRepository): Response
    {
        $allSeries = $seriesRepository->findAll();
        // dd($allActors);
        
        return $this->json($allSeries, Response::HTTP_OK, [], ['groups' => 'api_series_browse']);
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(int $id, SeriesRepository $seriesRepository): Response
    {
        $series = $seriesRepository->find($id);

        return $this->json($series, Response::HTTP_OK, [], ['groups' => 'api_series_read']);
    }

    /**
     * @Route("/{id}", name="edit", methods={"PATCH"}, requirements={"id"="\d+"})
     */
    public function edit(int $id, SeriesRepository $userListRepository, Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager): Response
    {
        $series = $userListRepository->find($id);

        $jsonContent = $request->getContent();
        $serializer->deserialize($jsonContent, Series::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $series]);  

        $entityManager->persist($series);
        $entityManager->flush();

        return $this->read($id, $userListRepository);
    }
}

