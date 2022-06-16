<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"establishment_get_data"})
     */
    private $id;

    // /**
    //  * @ORM\Column(type="string", length=100)
    //  * @Groups({"establishment_get_data"})
    //  */
    // private $username;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups({"establishment_get_data"})
     */
    private $published_at;

    /**
     * @ORM\Column(type="text")
     * @Groups({"establishment_get_data"})
     */
    private $content;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1, nullable=true)
     * @Groups({"establishment_get_data"})
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"establishment_get_data"})
     */
    private $picture;

    /**
     * @ORM\ManyToOne(targetEntity=Establishment::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $establishment;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"establishment_get_data"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getUsername(): ?string
    // {
    //     return $this->username;
    // }

    // public function setUsername(string $username): self
    // {
    //     $this->username = $username;

    //     return $this;
    // }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->published_at;
    }

    public function setPublishedAt(\DateTimeImmutable $published_at): self
    {
        $this->published_at = $published_at;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(?string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getEstablishment(): ?Establishment
    {
        return $this->establishment;
    }

    public function setEstablishment(?Establishment $establishment): self
    {
        $this->establishment = $establishment;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
