<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
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
    private $articleTitle;

    /**
     * @ORM\Column(type="text")
     */
    private $articleDescription;

    /**
     * @ORM\Column(type="date")
     */
    private $articleDate;

 

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="articlesByUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkUserId;

    public function getId()
    {
        return $this->id;
    }
    
        /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Veuillez selectionner une image pour l'annonce")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $articlePicture;

    public function getArticlePicture()
    {
        return $this->articlePicture;
    }

    public function setArticlePicture($articlePicture)
    {
        $this->articlePicture = $articlePicture;

        return $this;
    }

    public function getArticleTitle(): ?string
    {
        return $this->articleTitle;
    }

    public function setArticleTitle(string $articleTitle): self
    {
        $this->articleTitle = $articleTitle;

        return $this;
    }

    public function getArticleDescription(): ?string
    {
        return $this->articleDescription;
    }

    public function setArticleDescription(string $articleDescription): self
    {
        $this->articleDescription = $articleDescription;

        return $this;
    }

    public function getArticleDate(): ?\DateTimeInterface
    {
        return $this->articleDate;
    }

    public function setArticleDate(\DateTimeInterface $articleDate): self
    {
        $this->articleDate = $articleDate;

        return $this;
    }


    public function getFkUserId(): ?User
    {
        return $this->fkUserId;
    }

    public function setFkUserId(?User $fkUserId): self
    {
        $this->fkUserId = $fkUserId;

        return $this;
    }
}
