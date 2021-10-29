<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Season;
use App\Entity\Series;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $entityManager): void
    {
        $apiKey = "84c05081ccc468ff6d3235adc25d38b7";
        
        $errorArray = [];
        $addedSeriesId = [];

        $createdAt = new DateTimeImmutable('2021-10-28');

        for ($i=1; count($addedSeriesId) < 1; $i++) {

            $r = rand(50,50); 
            
            if(!in_array($r, $addedSeriesId)){

                try{
                    $response = (object) json_decode(file_get_contents("https://api.themoviedb.org/3/tv/$r?api_key=$apiKey&language=fr-FR"));
                }
                catch(\Exception $e){
                    array_push($errorArray, [
                        'seriesRequestError' => [
                            'seriesId' => $r,
                            'error' => $e,
                ],]);}

                //creation series
                $series = new Series();
                $entityManager->persist($series);

                $series->setTitle($response->name);

                $series->setSynopsis($response->overview);

                $series->setReleaseDate(new DateTimeImmutable($response->first_air_date));

                $series->setImage('https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces'.$response->backdrop_path);

                $series->setDirector($response->created_by[0]->name);

                $series->setNumberOfSeasons($response->number_of_seasons);

                $series->setCreatedAt($createdAt);

                //creation Actor
                $actor = new Actor();
                $entityManager->persist($actor);
                
                $actor->setFirstname('Greg');
                
                $actor->setLastname('O\'clock');
                
                $actor->setImage('ger.jpg');
                
                $actor->setCreatedAt($createdAt);
                
                
                //creation season
                $season = new Season();
                $entityManager->persist($season);
                
                $season->setSeasonNumber(3);
                
                $season->setNumberOfEpisodes(23);
                
                $season->setCreatedAt($createdAt);
                    
            }

            //linking entities
            $series->addSeason($season);
            $series->addActor($actor);
            
            $actor->addSeries($series);
            
            $season->setSeries($series);

            $entityManager->flush();
            array_push($addedSeriesId, $r);
        }
    }
}
