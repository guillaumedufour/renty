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
 * @ORM\Column(type="string", length=255, nullable=true)
 */
private $title;

/**
 * @ORM\Column(type="string", length=255, nullable=true)
 */
private $joblocation;

/**
 * @ORM\Column(type="text", nullable=true)
 */
private $description;

/**
 * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="jobObject")
 * @ORM\JoinColumn(nullable=false)
 */
private $jobAuthor;
private $__EXTRA__LINE;
/**
 * @ORM\Column(type="float")
 */
private $monthlyWage;


public function getTitle(): ?string
{
return $this->title;
}

public function setTitle(?string $title): self
{
$this->title = $title;

return $this;
}
public function getId()
{
return $this->id;
}
public function getJoblocation(): ?string
{
return $this->joblocation;
}

public function setJoblocation(?string $joblocation): self
{
$this->joblocation = $joblocation;

return $this;
}

public function getDescription(): ?string
{
return $this->description;
}

public function setDescription(?string $description): self
{
$this->description = $description;

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


public function getMonthlyWage(): ?float
{
return $this->monthlyWage;
}

public function setMonthlyWage(float $monthlyWage): self
{
$this->monthlyWage = $monthlyWage;
$__EXTRA__LINE;
return $this;
}


}