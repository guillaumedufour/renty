<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 */
class Role
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
    private $roleTitle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="userRole", orphanRemoval=true)
     */
    private $usersFromRole;

    public function __construct()
    {
        $this->usersFromRole = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRoleTitle(): ?string
    {
        return $this->roleTitle;
    }

    public function setRoleTitle(string $roleTitle): self
    {
        $this->roleTitle = $roleTitle;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsersFromRole(): Collection
    {
        return $this->usersFromRole;
    }

    public function addUsersFromRole(User $usersFromRole): self
    {
        if (!$this->usersFromRole->contains($usersFromRole)) {
            $this->usersFromRole[] = $usersFromRole;
            $usersFromRole->setUserRole($this);
        }

        return $this;
    }

    public function removeUsersFromRole(User $usersFromRole): self
    {
        if ($this->usersFromRole->contains($usersFromRole)) {
            $this->usersFromRole->removeElement($usersFromRole);
            // set the owning side to null (unless already changed)
            if ($usersFromRole->getUserRole() === $this) {
                $usersFromRole->setUserRole(null);
            }
        }

        return $this;
    }
    
     public function __toString(){
        // to show the name of the Category in the select
        return $this->roleTitle;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
