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
     * @ORM\Column(type="string", length=255)
     */
    private $jobAuthor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jobContact;

    /**
     * @ORM\Column(type="datetime")
     */
    private $jobDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $monthlyWage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jobLocation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $housed;

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

    public function getJobAuthor(): ?string
    {
        return $this->jobAuthor;
    }

    public function setJobAuthor(string $jobAuthor): self
    {
        $this->jobAuthor = $jobAuthor;

        return $this;
    }

    public function getJobContact(): ?string
    {
        return $this->jobContact;
    }

    public function setJobContact(string $jobContact): self
    {
        $this->jobContact = $jobContact;

        return $this;
    }

    public function getJobDate(): ?\DateTimeInterface
    {
        return $this->jobDate;
    }

    public function setJobDate(\DateTimeInterface $jobDate): self
    {
        $this->jobDate = $jobDate;

        return $this;
    }

    public function getMonthlyWage(): ?int
    {
        return $this->monthlyWage;
    }

    public function setMonthlyWage(int $monthlyWage): self
    {
        $this->monthlyWage = $monthlyWage;

        return $this;
    }

    public function getJobLocation(): ?string
    {
        return $this->jobLocation;
    }

    public function setJobLocation(string $jobLocation): self
    {
        $this->jobLocation = $jobLocation;

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
}
