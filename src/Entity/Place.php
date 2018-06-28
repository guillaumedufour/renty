<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaceRepository")
 */
class Place
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $town;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job", mappedBy="jobPlace", orphanRemoval=true)
     */
    private $jobsInPlace;

    public function __construct()
    {
        $this->jobsInPlace = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(?int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJobsInPlace(): Collection
    {
        return $this->jobsInPlace;
    }

    public function addJobsInPlace(Job $jobsInPlace): self
    {
        if (!$this->jobsInPlace->contains($jobsInPlace)) {
            $this->jobsInPlace[] = $jobsInPlace;
            $jobsInPlace->setJobPlace($this);
        }

        return $this;
    }

    public function removeJobsInPlace(Job $jobsInPlace): self
    {
        if ($this->jobsInPlace->contains($jobsInPlace)) {
            $this->jobsInPlace->removeElement($jobsInPlace);
            // set the owning side to null (unless already changed)
            if ($jobsInPlace->getJobPlace() === $this) {
                $jobsInPlace->setJobPlace(null);
            }
        }

        return $this;
    }
    
    public function __toString(){
        return $this->town;
    }
}
