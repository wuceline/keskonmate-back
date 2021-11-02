<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class GenreFixtures extends Fixture implements FixtureInterface
{
    public const GENRE_ID = "genre-";
    
    public function load(ObjectManager $entityManager): void
    {
/*         $apiKey = "84c05081ccc468ff6d3235adc25d38b7";

        $genreList = (object) json_decode(file_get_contents("https://api.themoviedb.org/3/genre/tv/list?api_key=$apiKey&language=fr-FR"));
        
        $createdGenre = [];
        $genreRefList = [];

        foreach ($genreList->genres as $k => $v) {
            $genre = new Genre();
            $entityManager->persist($genre);
        
            $genre->setName($v->name);
            
            $genre->setCreatedAt(new DateTimeImmutable('2021-10-28'));

            $this->addReference(self::GENRE_ID."$v->id", $genre);
            $createdGenre[$v->id] = $this->getReference(self::GENRE_ID."$v->id");
            
        } 
        $entityManager->flush();
        dd($this->getReference(self::GENRE_ID."18")); */
        
    }

}
