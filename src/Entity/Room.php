<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 */
class Room
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlaces;

    /**
     * @ORM\OneToMany(targetEntity=Showing::class, mappedBy="room")
     */
    private $showings;

    public function __construct()
    {
        $this->showings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): self
    {
        $this->nbPlaces = $nbPlaces;

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
            $showing->setRoom($this);
        }

        return $this;
    }

    public function removeShowing(Showing $showing): self
    {
        if ($this->showings->removeElement($showing)) {
            // set the owning side to null (unless already changed)
            if ($showing->getRoom() === $this) {
                $showing->setRoom(null);
            }
        }

        return $this;
    }
}
