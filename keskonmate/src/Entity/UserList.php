<?php

namespace App\Entity;

use App\Repository\UserListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=UserListRepository::class)
 */
class UserList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("api_users_browse")
     * @Groups("api_users_read")
     * @Groups("api_userlists_browse")
     * @Groups("api_userlists_read")
     */
    private $id;
   

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     * @Groups("api_users_browse")
     * @Groups("api_users_read")
     * @Groups("api_userlists_browse")
     * @Groups("api_userlists_read")
     */
    private $seasonNb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     * @Groups("api_users_browse")
     * @Groups("api_users_read")
     * @Groups("api_userlists_browse")
     * @Groups("api_userlists_read")
     */
    private $seriesNb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     * @Groups("api_users_browse")
     * @Groups("api_users_read")
     * @Groups("api_userlists_browse")
     * @Groups("api_userlists_read")
     */
    private $episodeNb;

    /**
     * @ORM\Column(type="datetime_immutable")
     * 
     * @Groups("api_users_browse")
     * @Groups("api_users_read")
     * @Groups("api_userlists_browse")
     * @Groups("api_userlists_read")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     * 
     * @Groups("api_users_browse")
     * @Groups("api_users_read")
     * @Groups("api_userlists_browse")
     * @Groups("api_userlists_read")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="smallint")
     * 
     * @Groups("api_users_browse")
     * @Groups("api_users_read")
     * @Groups("api_userlists_browse")
     * @Groups("api_userlists_read")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=Series::class, mappedBy="userlist")
     * 
     * @Groups("api_users_browse")
     * @Groups("api_users_read")
     * @Groups("api_userlists_browse")
     * @Groups("api_userlists_read")
     */
    private $series;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userlist")
     * 
     * @Groups("api_userlists_browse")
     * @Groups("api_userlists_read")
     */
    private $users;

    public function __construct()
    {
        $this->series = new ArrayCollection();
    }

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
            $series->addUserlist($this);
        }

        return $this;
    }

    public function removeSeries(Series $series): self
    {
        if ($this->series->removeElement($series)) {
            $series->removeUserlist($this);
        }

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }
}
