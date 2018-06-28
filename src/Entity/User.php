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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $userMail;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job", mappedBy="jobAuthor", orphanRemoval=true)
     */
    private $jobFromUser;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job", mappedBy="jobContact")
     */
    private $jobFromContact;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rent", mappedBy="rentAuthor", orphanRemoval=true)
     */
    private $rentsFromUser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="usersFromRole")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userRole;

    public function __construct()
    {
        $this->jobFromUser = new ArrayCollection();
        $this->jobFromContact = new ArrayCollection();
        $this->rentsFromUser = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUserType(): ?string
    {
        return $this->userType;
    }

    public function setUserType(string $userType): self
    {
        $this->userType = $userType;

        return $this;
    }

    public function getUserMail(): ?string
    {
        return $this->userMail;
    }

    public function setUserMail(?string $userMail): self
    {
        $this->userMail = $userMail;

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJobFromUser(): Collection
    {
        return $this->jobFromUser;
    }

    public function addJobFromUser(Job $jobFromUser): self
    {
        if (!$this->jobFromUser->contains($jobFromUser)) {
            $this->jobFromUser[] = $jobFromUser;
            $jobFromUser->setJobAuthor($this);
        }

        return $this;
    }

    public function removeJobFromUser(Job $jobFromUser): self
    {
        if ($this->jobFromUser->contains($jobFromUser)) {
            $this->jobFromUser->removeElement($jobFromUser);
            // set the owning side to null (unless already changed)
            if ($jobFromUser->getJobAuthor() === $this) {
                $jobFromUser->setJobAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJobFromContact(): Collection
    {
        return $this->jobFromContact;
    }

    public function addJobFromContact(Job $jobFromContact): self
    {
        if (!$this->jobFromContact->contains($jobFromContact)) {
            $this->jobFromContact[] = $jobFromContact;
            $jobFromContact->setJobContact($this);
        }

        return $this;
    }

    public function removeJobFromContact(Job $jobFromContact): self
    {
        if ($this->jobFromContact->contains($jobFromContact)) {
            $this->jobFromContact->removeElement($jobFromContact);
            // set the owning side to null (unless already changed)
            if ($jobFromContact->getJobContact() === $this) {
                $jobFromContact->setJobContact(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rent[]
     */
    public function getRentsFromUser(): Collection
    {
        return $this->rentsFromUser;
    }

    public function addRentsFromUser(Rent $rentsFromUser): self
    {
        if (!$this->rentsFromUser->contains($rentsFromUser)) {
            $this->rentsFromUser[] = $rentsFromUser;
            $rentsFromUser->setRentAuthor($this);
        }

        return $this;
    }

    public function removeRentsFromUser(Rent $rentsFromUser): self
    {
        if ($this->rentsFromUser->contains($rentsFromUser)) {
            $this->rentsFromUser->removeElement($rentsFromUser);
            // set the owning side to null (unless already changed)
            if ($rentsFromUser->getRentAuthor() === $this) {
                $rentsFromUser->setRentAuthor(null);
            }
        }

        return $this;
    }

    public function getUserRole(): ?Role
    {
        return $this->userRole;
    }

    public function setUserRole(?Role $userRole): self
    {
        $this->userRole = $userRole;

        return $this;
    }
    
    public function __toString(){
        return $this->username;
    }
}
