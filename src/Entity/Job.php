<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
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
    private $jobTitle;

    /**
     * @ORM\Column(type="text")
     */
    private $jobContent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="jobFromUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobAuthor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="jobFromContact")
     */
    private $jobContact;

    /**
     * @ORM\Column(type="date")
     */
    private $jobDateBegin;

    /**
     * @ORM\Column(type="integer")
     */
    private $jobWages;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="jobsInPlace")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobPlace;

    /**
     * @ORM\Column(type="boolean")
     */
    private $housed;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SectorArea", inversedBy="jobsFromSector")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobSector;

    public function getId()
    {
        return $this->id;
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

    public function getJobAuthor(): ?User
    {
        return $this->jobAuthor;
    }

    public function setJobAuthor(?User $jobAuthor): self
    {
        $this->jobAuthor = $jobAuthor;

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

    public function getJobPlace(): ?Place
    {
        return $this->jobPlace;
    }

    public function setJobPlace(?Place $jobPlace): self
    {
        $this->jobPlace = $jobPlace;

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
}
