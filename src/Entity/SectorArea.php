<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectorAreaRepository")
 */
class SectorArea
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
    private $sectorTitle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job", mappedBy="jobSector", orphanRemoval=true)
     */
    private $jobsFromSector;

    public function __construct()
    {
        $this->jobsFromSector = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSectorTitle(): ?string
    {
        return $this->sectorTitle;
    }

    public function setSectorTitle(string $sectorTitle): self
    {
        $this->sectorTitle = $sectorTitle;

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJobsFromSector(): Collection
    {
        return $this->jobsFromSector;
    }

    public function addJobsFromSector(Job $jobsFromSector): self
    {
        if (!$this->jobsFromSector->contains($jobsFromSector)) {
            $this->jobsFromSector[] = $jobsFromSector;
            $jobsFromSector->setJobSector($this);
        }

        return $this;
    }

    public function removeJobsFromSector(Job $jobsFromSector): self
    {
        if ($this->jobsFromSector->contains($jobsFromSector)) {
            $this->jobsFromSector->removeElement($jobsFromSector);
            // set the owning side to null (unless already changed)
            if ($jobsFromSector->getJobSector() === $this) {
                $jobsFromSector->setJobSector(null);
            }
        }

        return $this;
    }
    
    public function __toString(){
        return $this->sectorTitle;
    }
}
