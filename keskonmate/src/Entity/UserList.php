<?php

namespace App\Entity;

use App\Repository\UserListRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserListRepository::class)
 */
class UserList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
   

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seasonNb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seriesNb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $episodeNb;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="smallint")
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeasonNb(): ?int
    {
        return $this->seasonNb;
    }

    public function setSeasonNb(?int $seasonNb): self
    {
        $this->seasonNb = $seasonNb;

        return $this;
    }

    public function getSeriesNb(): ?int
    {
        return $this->seriesNb;
    }

    public function setSeriesNb(?int $seriesNb): self
    {
        $this->seriesNb = $seriesNb;

        return $this;
    }

    public function getEpisodeNb(): ?int
    {
        return $this->episodeNb;
    }

    public function setEpisodeNb(?int $episodeNb): self
    {
        $this->episodeNb = $episodeNb;

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }
}
