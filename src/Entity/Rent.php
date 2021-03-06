<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;





/**
 * @ORM\Entity(repositoryClass="App\Repository\RentRepository")
 */
class Rent
{
    public function __construct()
{

    //$this->rentDatePost = new \DateTime('now');
    $this->dispoDate = new \DateTime('now');
}
    
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
     * @ORM\Column(type="date")
     */
    private $rentDatePost;

    /**
     * @ORM\Column(type="date")
     */
    
    private $dispoDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $monthCost;

    /**
     * @ORM\Column(type="integer")
     */
    private $rentSurface;

    /**
     * @ORM\Column(type="boolean")
     */
    private $furnished;

 

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="rentsfromusers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rentContact;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Veuillez selectionner une image pour l'annonce")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rentPlace;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rentPostalCode;


    public function getPicture()
    {
        return $this->picture;
    }

    public function setpicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function getRentTitle()
    {
        return $this->rentTitle;
    }

    public function setRentTitle(string $rentTitle): self
    {
        $this->rentTitle = $rentTitle;

        return $this;
    }

    public function getRentContent()
    {
        return $this->rentContent;
    }

    public function setRentContent(string $rentContent): self
    {
        $this->rentContent = $rentContent;

        return $this;
    }

    public function getRentDatePost(): ?\DateTimeInterface
    {
        return $this->rentDatePost;
    }

    public function setRentDatePost(\DateTimeInterface $rentDatePost): self
    {
        $this->rentDatePost = $rentDatePost;

        return $this;
    }

    public function getDispoDate(): ?\DateTimeInterface
    {
        return $this->dispoDate;
    }

    public function setDispoDate(\DateTimeInterface $dispoDate): self
    {
        $this->dispoDate = $dispoDate;

        return $this;
    }

    public function getMonthCost(): ?int
    {
        return $this->monthCost;
    }

    public function setMonthCost(int $monthCost): self
    {
        $this->monthCost = $monthCost;

        return $this;
    }

    public function getRentSurface(): ?int
    {
        return $this->rentSurface;
    }

    public function setRentSurface(int $rentSurface): self
    {
        $this->rentSurface = $rentSurface;

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




    public function getRentContact(): ?User
    {
        return $this->rentContact;
    }

    public function setRentContact(?User $rentContact): self
    {
        $this->rentContact = $rentContact;

        return $this;
    }

    public function getRentPlace(): ?string
    {
        return $this->rentPlace;
    }

    public function setRentPlace(?string $rentPlace): self
    {
        $this->rentPlace = $rentPlace;

        return $this;
    }

    public function getRentPostalCode(): ?int
    {
        return $this->rentPostalCode;
    }

    public function setRentPostalCode(?int $rentPostalCode): self
    {
        $this->rentPostalCode = $rentPostalCode;

        return $this;
    }


  
}
