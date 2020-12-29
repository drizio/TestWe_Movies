<?php

namespace App\Entity;

use App\Repository\MovieHasPeopleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MovieHasPeopleRepository::class)
 */
class MovieHasPeople
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $significance;

    /**
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity=Movie::class, inversedBy="movieHasPeople")
     * @ORM\JoinColumn(name="Movie_id", nullable=false)
     */
    private $movie;

    /**
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity=Person::class, inversedBy="movieHasPeople")
     * @ORM\JoinColumn(name="People_id", nullable=false)
     * @Groups("movie")
     */
    private $person;

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getSignificance(): ?string
    {
        return $this->significance;
    }

    public function setSignificance(?string $significance): self
    {
        $this->significance = $significance;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }
}
