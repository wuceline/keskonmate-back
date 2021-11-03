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
use Doctrine\Common\DataFixtures\FixtureInterface;

class AppFixtures extends Fixture implements FixtureInterface
{
    public const GENRE_ID = "genre-";
    public const ACTOR_ID = "actor-";
    public const SEASON_ID = "season-";
    
    public function load(ObjectManager $entityManager): void
    {
        $apiKey = "84c05081ccc468ff6d3235adc25d38b7";

        $currentDateTime = new DateTimeImmutable(date("H:i:s"));
        
        $addedSeriesId = [];

        $tmdbGenreList = (object) json_decode(file_get_contents("https://api.themoviedb.org/3/genre/tv/list?api_key=$apiKey&language=fr-FR"));

        foreach ($tmdbGenreList->genres as $k => $genreInfo) {
            $genre = new Genre();
            $entityManager->persist($genre);
        
            $genre->setName($genreInfo->name);
            
            $genre->setCreatedAt($currentDateTime);

            $this->addReference(self::GENRE_ID."$genreInfo->id", $genre);
        }

        //genre "aucun genre" pour les série qui n'en n'ont pas
        $noGenre = new Genre();
        $entityManager->persist($noGenre);
        $noGenre->setName("Aucun Genre");
        $noGenre->setCreatedAt($currentDateTime);
        $this->addReference(self::GENRE_ID."-none", $noGenre);

        for ($i=1; count($addedSeriesId) < 10; $i++) {

            $r = rand(20,35); 
            
            while(in_array($r, $addedSeriesId)){
                $r = rand(1,300); 
            }

            $handle = curl_init("https://api.themoviedb.org/3/tv/$r?api_key=$apiKey&language=fr-FR");
           
            if($this->checkApiUrlResponse($handle) == 200){

                $seriesApiResponse = (object) json_decode(file_get_contents("https://api.themoviedb.org/3/tv/$r?api_key=$apiKey&language=fr-FR"));
                 
//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-Creation Series-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
                $series = new Series();
                $entityManager->persist($series);

                $series->setTitle($seriesApiResponse->name);

                $series->setSynopsis(!$seriesApiResponse->overview ? '' : $seriesApiResponse->overview);

                $series->setReleaseDate(new DateTimeImmutable($seriesApiResponse->first_air_date));

                $series->setImage(empty($seriesApiResponse->backdrop_path) ? '' : 'https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces'.$seriesApiResponse->backdrop_path);

                $series->setDirector(!isset($seriesApiResponse->created_by[0]->name) ? '' : $seriesApiResponse->created_by[0]->name);

                $series->setNumberOfSeasons($seriesApiResponse->number_of_seasons);

                $series->setCreatedAt($currentDateTime);

                foreach($seriesApiResponse->genres as $key => $value){
                    $genreId = !isset($seriesApiResponse->genres[$key]->id) ? '-none' : $seriesApiResponse->genres[$key]->id;
                    $series->addGenre($this->getReference(self::GENRE_ID."$genreId"));
                }
                
//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-Creation Actor-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
                $handle = curl_init("https://api.themoviedb.org/3/tv/$r/credits?api_key=$apiKey&language=fr-FR");
                if($this->checkApiUrlResponse($handle) == 200){
                    $seriessActorList = (object) json_decode(file_get_contents("https://api.themoviedb.org/3/tv/$r/credits?api_key=$apiKey&language=fr-FR"));
                    
                    if(!empty($seriessActorList->cast)){
                        
                        foreach ($seriessActorList->cast as $key => $actorsInfo) {
                            
                            /* dd($seriessActorList->cast[0]->id); */
                            $actor = new Actor();
                            $entityManager->persist($actor);
                            
                            $actor->setName($actorsInfo->name);
                            
                            $actor->setImage(empty($actorsInfo->profile_path) ? '' : "https://www.themoviedb.org/t/p/w138_and_h175_face$actorsInfo->profile_path");
                            
                            $actor->setCreatedAt($currentDateTime);

                            $this->addReference(self::ACTOR_ID."$actorsInfo->id", $actor);
                        }

                        foreach ($seriessActorList->cast as $key => $value) {
                            $actorId = $seriessActorList->cast[$key]->id;
                            $series->addActor($this->getReference(self::ACTOR_ID."$actorId"));
                        }
                    }
                }
  
//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-Creation Season-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
                if(!empty($seriesApiResponse->seasons)){                
                    foreach($seriesApiResponse->seasons as $key => $seasonInfo){
                        
                        $season = new Season();
                        $entityManager->persist($season);
                        
                        $season->setSeasonNumber($seasonInfo->season_number);
                        
                        $season->setNumberOfEpisodes($seasonInfo->episode_count);

                        $season->setImage(empty($seasonInfo->poster_path) ? '' : "https://www.themoviedb.org/t/p/w130_and_h195_bestv2$seasonInfo->poster_path");
                        
                        $season->setCreatedAt($currentDateTime);

                        $this->addReference(self::SEASON_ID."$seasonInfo->id", $season);
                    }

                    foreach($seriesApiResponse->seasons as $key => $seasonInfo){
                        $seasonId = $seriesApiResponse->seasons[$key]->id;
                        $series->addSeason($this->getReference(self::SEASON_ID."$seasonId"));
                    }
                }

                $entityManager->flush();
                array_push($addedSeriesId, $r);
            }             
        }
    }

    public function checkApiUrlResponse($handle)
    {
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
        curl_exec($handle);
        $statusCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);

        return $statusCode;
    }
}

