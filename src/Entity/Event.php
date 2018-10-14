<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(type="string", length=100)
     */
    private $location;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Organisateur", inversedBy="Events")
     */
    private $organisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticketevent", mappedBy="event")
     */
    private $ticketevents;

    public function __construct()
    {
        $this->ticketevents = new ArrayCollection();
    }

    

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

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getStartat(): ?\DateTimeInterface
    {
        return $this->startat;
    }

    public function setStartat(\DateTimeInterface $startat): self
    {
        $this->startat = $startat;

        return $this;
    }

    public function getEndat(): ?\DateTimeInterface
    {
        return $this->endat;
    }

    public function setEndat(\DateTimeInterface $endat): self
    {
        $this->endat = $endat;

        return $this;
    }

    public function getOrganisateur(): ?Organisateur
    {
        return $this->organisateur;
    }

    public function setOrganisateur(?Organisateur $organisateur): self
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    /**
     * @return Collection|Ticketevent[]
     */
    public function getTicketevents(): Collection
    {
        return $this->ticketevents;
    }

    public function addTicketevent(Ticketevent $ticketevent): self
    {
        if (!$this->ticketevents->contains($ticketevent)) {
            $this->ticketevents[] = $ticketevent;
            $ticketevent->setEvent($this);
        }

        return $this;
    }

    public function removeTicketevent(Ticketevent $ticketevent): self
    {
        if ($this->ticketevents->contains($ticketevent)) {
            $this->ticketevents->removeElement($ticketevent);
            // set the owning side to null (unless already changed)
            if ($ticketevent->getEvent() === $this) {
                $ticketevent->setEvent(null);
            }
        }

        return $this;
    }
    Public function __toString()
    {
        return $this->name;
    }

    
}
