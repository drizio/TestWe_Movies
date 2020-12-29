<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovieRepository::class)
 * @ApiResource(
 * normalizationContext={"groups"={"movie"}})
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("movie")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("movie")
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     * @Groups("movie")
     */
    private $duration;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class, inversedBy="movies")
     * @ORM\JoinTable(name="movie_has_type",
     *      joinColumns={@ORM\JoinColumn(name="Movie_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="Type_id", referencedColumnName="id")}
     * )
     * @Groups("movie")
     */
    private $types;

    /**
     * @ORM\OneToMany(targetEntity=Showing::class, mappedBy="movie", orphanRemoval=true)
     */
    private $showings;

    /**
     * @ORM\OneToMany(targetEntity=MovieHasPeople::class, mappedBy="movie", orphanRemoval=true)
     * @Groups("movie")
     */
    private $movieHasPeople;

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->showings = new ArrayCollection();
        $this->movieHasPeople = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return Collection|Type[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    /**
     * @return Collection|Showing[]
     */
    public function getShowings(): Collection
    {
        return $this->showings;
    }

    public function addShowing(Showing $showing): self
    {
        if (!$this->showings->contains($showing)) {
            $this->showings[] = $showing;
            $showing->setMovie($this);
        }

        return $this;
    }

    public function removeShowing(Showing $showing): self
    {
        if ($this->showings->removeElement($showing)) {
            // set the owning side to null (unless already changed)
            if ($showing->getMovie() === $this) {
                $showing->setMovie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MovieHasPeople[]
     */
    public function getMovieHasPeople(): Collection
    {
        return $this->movieHasPeople;
    }

    public function addMovieHasPerson(MovieHasPeople $movieHasPerson): self
    {
        if (!$this->movieHasPeople->contains($movieHasPerson)) {
            $this->movieHasPeople[] = $movieHasPerson;
            $movieHasPerson->setMovie($this);
        }

        return $this;
    }

    public function removeMovieHasPerson(MovieHasPeople $movieHasPerson): self
    {
        if ($this->movieHasPeople->removeElement($movieHasPerson)) {
            // set the owning side to null (unless already changed)
            if ($movieHasPerson->getMovie() === $this) {
                $movieHasPerson->setMovie(null);
            }
        }

        return $this;
    }
}
