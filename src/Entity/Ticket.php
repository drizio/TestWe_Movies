<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Price::class, inversedBy="tickets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Showing::class, inversedBy="tickets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $showing;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="tickets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userOrder;

    /**
     * @ORM\OneToOne(targetEntity=Spectator::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $spectator;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setPrice(?Price $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getShowing(): ?Showing
    {
        return $this->showing;
    }

    public function setShowing(?Showing $showing): self
    {
        $this->showing = $showing;

        return $this;
    }

    public function getUserOrder(): ?Order
    {
        return $this->userOrder;
    }

    public function setUserOrder(?Order $userOrder): self
    {
        $this->userOrder = $userOrder;

        return $this;
    }

    public function getSpectator(): ?Spectator
    {
        return $this->spectator;
    }

    public function setSpectator(Spectator $spectator): self
    {
        $this->spectator = $spectator;

        return $this;
    }
}
