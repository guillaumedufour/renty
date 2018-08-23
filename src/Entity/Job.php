<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    
        public function __construct()
{
    $this->jobDateBegin = new \DateTime('now');
   
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
    private $jobTitle;

    /**
     * @ORM\Column(type="text")
     */
    private $jobContent;



    /**
     * @ORM\Column(type="date")
     */
    private $jobDateBegin;

    /**
     * @ORM\Column(type="integer")
     */
    private $jobWages;

   
    /**
     * @ORM\Column(type="boolean")
     */
    private $housed;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SectorArea", inversedBy="jobsFromSector")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobSector;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="jobsfromuser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobContact;

    /**
     * @ORM\Column(type="datetime")
     */
    private $jobDatePost;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Veuillez séléctionner une image pour le job")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jobPlace;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $jobPostalCode;

    public function getPicture()
    {
        return $this->picture;
    }

    public function setpicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
    
    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getJobContent(): ?string
    {
        return $this->jobContent;
    }

    public function setJobContent(string $jobContent): self
    {
        $this->jobContent = $jobContent;

        return $this;
    }


    public function getJobDateBegin(): ?\DateTimeInterface
    {
        return $this->jobDateBegin;
    }

    public function setJobDateBegin(\DateTimeInterface $jobDateBegin): self
    {
        $this->jobDateBegin = $jobDateBegin;

        return $this;
    }

    public function getJobWages(): ?int
    {
        return $this->jobWages;
    }

    public function setJobWages(int $jobWages): self
    {
        $this->jobWages = $jobWages;

        return $this;
    }

    

    public function getHoused(): ?bool
    {
        return $this->housed;
    }

    public function setHoused(bool $housed): self
    {
        $this->housed = $housed;

        return $this;
    }

    public function getJobSector(): ?SectorArea
    {
        return $this->jobSector;
    }

    public function setJobSector(?SectorArea $jobSector): self
    {
        $this->jobSector = $jobSector;

        return $this;
    }

    public function getJobContact(): ?User
    {
        return $this->jobContact;
    }

    public function setJobContact(?User $jobContact): self
    {
        $this->jobContact = $jobContact;

        return $this;
    }

    public function getJobDatePost(): ?\DateTimeInterface
    {
        return $this->jobDatePost;
    }

    public function setJobDatePost(\DateTimeInterface $jobDatePost): self
    {
        $this->jobDatePost = $jobDatePost;

        return $this;
    }

    public function getJobPlace(): ?string
    {
        return $this->jobPlace;
    }

    public function setJobPlace(?string $jobPlace): self
    {
        $this->jobPlace = $jobPlace;

        return $this;
    }

    public function getJobPostalCode(): ?int
    {
        return $this->jobPostalCode;
    }

    public function setJobPostalCode(?int $jobPostalCode): self
    {
        $this->jobPostalCode = $jobPostalCode;

        return $this;
    }
}
