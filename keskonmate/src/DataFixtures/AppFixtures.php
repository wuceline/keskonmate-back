<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Season;
use App\Entity\Series;
use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use App\DataFixtures\GenreFixtures;

class AppFixtures extends Fixture implements FixtureInterface,DependentFixtureInterface
{
    public const GENRE_ID = "genre-";
    public const ACTOR_ID = "actor-";
    
    public function load(ObjectManager $entityManager): void
    {
        $apiKey = "84c05081ccc468ff6d3235adc25d38b7";
        
        $tmdbGenreList = (object) json_decode(file_get_contents("https://api.themoviedb.org/3/genre/tv/list?api_key=$apiKey&language=fr-FR"));

        $createdAt = new DateTimeImmutable(date("H:i:s"));

        foreach ($tmdbGenreList->genres as $k => $v) {
            $genre = new Genre();
            $entityManager->persist($genre);
        
            $genre->setName($v->name);
            
            $genre->setCreatedAt($createdAt);

            $this->addReference(self::GENRE_ID."$v->id", $genre);
        } 
        
        $noGenre = new Genre();
        $entityManager->persist($noGenre);
        $noGenre->setName("Aucun genre");
        $noGenre->setCreatedAt($createdAt);
        $this->addReference(self::GENRE_ID."-none", $noGenre);
        $entityManager->flush();

        $errorArray = [];
        $addedSeriesId = [];

        for ($i=1; count($addedSeriesId) < 10; $i++) {

            $r = rand(20,35); 
            
            while(in_array($r, $addedSeriesId)){
                $r = rand(20,35); 
            }

            $handle = curl_init("https://api.themoviedb.org/3/tv/$r?api_key=$apiKey&language=fr-FR");
           
            if($this->checkApiUrlResponse($handle) == 200){

                $seriesApiResponse = (object) json_decode(file_get_contents("https://api.themoviedb.org/3/tv/$r?api_key=$apiKey&language=fr-FR"));
                 
                //creation series
                $series = new Series();
                $entityManager->persist($series);

                $series->setTitle($seriesApiResponse->name);

                $series->setSynopsis(!$seriesApiResponse->overview ? '' : $seriesApiResponse->overview);

                $series->setReleaseDate(new DateTimeImmutable($seriesApiResponse->first_air_date));

                $series->setImage('https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces'.$seriesApiResponse->backdrop_path);

                $series->setDirector(!isset($seriesApiResponse->created_by[0]->name) ? '' : $seriesApiResponse->created_by[0]->name);

                $series->setNumberOfSeasons($seriesApiResponse->number_of_seasons);

                $series->setCreatedAt($createdAt);

                foreach($seriesApiResponse->genres as $key => $value){
                    $genreId = !isset($seriesApiResponse->genres[$key]->id) ? '-none' : $seriesApiResponse->genres[$key]->id;
                    $series->addGenre($this->getReference(GenreFixtures::GENRE_ID."$genreId"));
                }
                
                //creation Actor
                $handle = curl_init("https://api.themoviedb.org/3/tv/$r/credits?api_key=$apiKey&language=fr-FR");
                if($this->checkApiUrlResponse($handle) == 200){
                    $seriessActorList = (object) json_decode(file_get_contents("https://api.themoviedb.org/3/tv/$r/credits?api_key=$apiKey&language=fr-FR"));
                   
                    if(!empty($seriessActorList->cast)){
                        
                        foreach ($seriessActorList->cast as $key => $actorsInfo) {
                            
                            /* dd($seriessActorList->cast[0]->id); */
                            $actor = new Actor();
                            $entityManager->persist($actor);
                            
                            $actor->setFirstname($actorsInfo->name);
                            
                            $actor->setLastname('');
                            
                            $actor->setImage(empty($actorsInfo->profile_path) ? '' : "https://www.themoviedb.org/t/p/w138_and_h175_face$actorsInfo->profile_path");
                            
                            $actor->setCreatedAt($createdAt);

                            $this->addReference(self::ACTOR_ID."$actorsInfo->id", $actor);
                        }
                    }
                    
                }else{
                    dump($r);
                }

                foreach ($seriessActorList->cast as $key => $value) {
                    $actorId = !isset($seriessActorList->cast[$key]->id) ? '-none' : $seriessActorList->cast[$key]->id;
                    $series->addActor($this->getReference(self::ACTOR_ID."$actorId"));
                }
                

                
                //creation season
                $season = new Season();
                $entityManager->persist($season);
                
                $season->setSeasonNumber(3);
                
                $season->setNumberOfEpisodes(23);
                
                $season->setCreatedAt($createdAt);









                /* $entityManager->flush(); */

                









                /*//linking entities
                $series->addSeason($season);
                $series->addActor($actor);
                
                $actor->addSeries($series);
                
                $season->setSeries($series);
    
                $entityManager->flush();*/
                array_push($addedSeriesId, $r);
            }             
            
        }
        dump($addedSeriesId);
        dump(array_count_values($addedSeriesId));
    }

    public function checkApiUrlResponse($handle)
    {
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
        curl_exec($handle);
        $statusCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);

        return $statusCode;
    }

    public function getDependencies()
    {
        return [
            GenreFixtures::class,
        ];
    }
}

