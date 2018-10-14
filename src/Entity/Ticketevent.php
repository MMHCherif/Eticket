<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketeventRepository")
 */
class Ticketevent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=3)
     */
    private $price;

    /**
     * @ORM\Column(type="smallint")
     */
    private $quantity;

    /**
     * @ORM\Column(type="datetime")
     */
    private $stopsaleat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="ticketevents")
     */
    private $event;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getStopsaleat(): ?\DateTimeInterface
    {
        return $this->stopsaleat;
    }

    public function setStopsaleat(\DateTimeInterface $stopsaleat): self
    {
        $this->stopsaleat = $stopsaleat;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }
    Public function __toString()
    {
        return $this->name;
    }
}
