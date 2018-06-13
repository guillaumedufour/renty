<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $usertype;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rent", mappedBy="rentAuthor", orphanRemoval=true)
     */
    private $userRentObject;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job", mappedBy="jobAuthor", orphanRemoval=true)
     */
    private $jobObject;

    public function __construct()
    {
        $this->userRentObject = new ArrayCollection();
        $this->jobObject = new ArrayCollection();
    }


    public function getId()
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

    public function getUsertype(): ?string
    {
        return $this->usertype;
    }

    public function setUsertype(string $usertype): self
    {
        $this->usertype = $usertype;

        return $this;
    }

    /**
     * @return Collection|Rent[]
     */
    public function getUserRentObject(): Collection
    {
        return $this->userRentObject;
    }

    public function addUserRentObject(Rent $userRentObject): self
    {
        if (!$this->userRentObject->contains($userRentObject)) {
            $this->userRentObject[] = $userRentObject;
            $userRentObject->setRentAuthor($this);
        }

        return $this;
    }

    public function removeUserRentObject(Rent $userRentObject): self
    {
        if ($this->userRentObject->contains($userRentObject)) {
            $this->userRentObject->removeElement($userRentObject);
            // set the owning side to null (unless already changed)
            if ($userRentObject->getRentAuthor() === $this) {
                $userRentObject->setRentAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJobObject(): Collection
    {
        return $this->jobObject;
    }

    public function addJobObject(Job $jobObject): self
    {
        if (!$this->jobObject->contains($jobObject)) {
            $this->jobObject[] = $jobObject;
            $jobObject->setJobAuthor($this);
        }

        return $this;
    }

    public function removeJobObject(Job $jobObject): self
    {
        if ($this->jobObject->contains($jobObject)) {
            $this->jobObject->removeElement($jobObject);
            // set the owning side to null (unless already changed)
            if ($jobObject->getJobAuthor() === $this) {
                $jobObject->setJobAuthor(null);
            }
        }

        return $this;
    }
    
    public function __toString(){
        // to show the name of the user in the select
        return $this->name;
        
    }
}
