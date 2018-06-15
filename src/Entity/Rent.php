<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RentRepository")
 */
class Rent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rentTitle;

    /**
     * @ORM\Column(type="text")
     */
    private $rentContent;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $rentAuthor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rentContact;

    /**
     * @ORM\Column(type="datetime")
     */
    private $rentDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $monthlyCost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rentLocation;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="boolean")
     */
    private $furnished;

    public function getId()
    {
        return $this->id;
    }

    public function getRentTitle(): ?string
    {
        return $this->rentTitle;
    }

    public function setRentTitle(string $rentTitle): self
    {
        $this->rentTitle = $rentTitle;

        return $this;
    }

    public function getRentContent(): ?string
    {
        return $this->rentContent;
    }

    public function setRentContent(string $rentContent): self
    {
        $this->rentContent = $rentContent;

        return $this;
    }

    public function getRentAuthor(): ?string
    {
        return $this->rentAuthor;
    }

    public function setRentAuthor(string $rentAuthor): self
    {
        $this->rentAuthor = $rentAuthor;

        return $this;
    }

    public function getRentContact(): ?string
    {
        return $this->rentContact;
    }

    public function setRentContact(string $rentContact): self
    {
        $this->rentContact = $rentContact;

        return $this;
    }

    public function getRentDate(): ?\DateTimeInterface
    {
        return $this->rentDate;
    }

    public function setRentDate(\DateTimeInterface $rentDate): self
    {
        $this->rentDate = $rentDate;

        return $this;
    }

    public function getMonthlyCost(): ?int
    {
        return $this->monthlyCost;
    }

    public function setMonthlyCost(int $monthlyCost): self
    {
        $this->monthlyCost = $monthlyCost;

        return $this;
    }

    public function getRentLocation(): ?string
    {
        return $this->rentLocation;
    }

    public function setRentLocation(string $rentLocation): self
    {
        $this->rentLocation = $rentLocation;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getFurnished(): ?bool
    {
        return $this->furnished;
    }

    public function setFurnished(bool $furnished): self
    {
        $this->furnished = $furnished;

        return $this;
    }
}
