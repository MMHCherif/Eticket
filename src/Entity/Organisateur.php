<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrganisateurRepository")
 */
class Organisateur
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
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $tel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="organisateur")
     */
    private $Events;

    

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->Events = new ArrayCollection();
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->Events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->Events->contains($event)) {
            $this->Events[] = $event;
            $event->setOrganisateur($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->Events->contains($event)) {
            $this->Events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getOrganisateur() === $this) {
                $event->setOrganisateur(null);
            }
        }

        return $this;
    }
    Public function __toString()
    {
        return $this->name;
    }
    
}
