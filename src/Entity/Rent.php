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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

  
    /**
     * @ORM\Column(type="float")
     */
    private $nbpeople;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rentlocation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $renttype;

    /**
     * @ORM\Column(type="float")
     */
    private $monthlyrent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userRentObject")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rentAuthor;

  
    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getNbpeople(): ?float
    {
        return $this->nbpeople;
    }

    public function setNbpeople(float $nbpeople): self
    {
        $this->nbpeople = $nbpeople;

        return $this;
    }

    public function getRentlocation(): ?string
    {
        return $this->rentlocation;
    }

    public function setRentlocation(?string $rentlocation): self
    {
        $this->rentlocation = $rentlocation;

        return $this;
    }

    public function getRenttype(): ?string
    {
        return $this->renttype;
    }

    public function setRenttype(string $renttype): self
    {
        $this->renttype = $renttype;

        return $this;
    }

    public function getMonthlyrent(): ?float
    {
        return $this->monthlyrent;
    }

    public function setMonthlyrent(float $monthlyrent): self
    {
        $this->monthlyrent = $monthlyrent;

        return $this;
    }

    public function getRentAuthor(): ?User
    {
        return $this->rentAuthor;
    }

    public function setRentAuthor(?User $rentAuthor): self
    {
        $this->rentAuthor = $rentAuthor;

        return $this;
    }

    
}
