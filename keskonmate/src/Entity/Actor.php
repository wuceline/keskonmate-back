<?php

namespace App\Entity;

use App\Repository\ActorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ActorRepository::class)
 */
class Actor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("api_actors_browse")
     * @Groups("api_actors_read")
     * @Groups("api_series_browse")
     * @Groups("api_series_read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     * 
     * @Groups("api_actors_browse")
     * @Groups("api_actors_read")
     * @Groups("api_series_browse")
     * @Groups("api_series_read")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=128)
     * 
     * @Groups("api_actors_browse")
     * @Groups("api_actors_read")
     * @Groups("api_series_browse")
     * @Groups("api_series_read")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups("api_actors_browse")
     * @Groups("api_actors_read")
     * @Groups("api_series_browse")
     * @Groups("api_series_read")
     */
    private $image;

    /**
     * @ORM\Column(type="datetime_immutable")
     * 
     * @Groups("api_actors_browse")
     * @Groups("api_actors_read")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     * 
     * @Groups("api_actors_browse")
     * @Groups("api_actors_read")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Series::class, mappedBy="actor", cascade={"persist"})
     * 
     * @Groups("api_actors_browse")
     * @Groups("api_actors_read")
     */
    private $series;

    public function __construct()
    {
        $this->series = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Series[]
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Series $series): self
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
            $series->addActor($this);
        }

        return $this;
    }

    public function removeSeries(Series $series): self
    {
        if ($this->series->removeElement($series)) {
            $series->removeActor($this);
        }

        return $this;
    }
}
