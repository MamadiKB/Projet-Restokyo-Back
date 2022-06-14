<?php

namespace App\Entity;

use App\Entity\District;
use App\Repository\EstablishmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=EstablishmentRepository::class)
 * 
 * @ORM\HasLifecycleCallbacks()
 * 
 * 
 */
class Establishment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=200)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data"})
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $price;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $opening_days;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $noon_opening_time;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $evening_opening_time;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $website;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $phone;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1, nullable=true)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     */
    private $picture;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="establishment", orphanRemoval=true)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=District::class, inversedBy="establishments")
     * @Groups({"establishments_get_list", "establishment_get_data", "tags_get_establishments"})
     */
    private $district;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="establishments")
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $tags;

    /**
     *
     * Used to set a validation status on each establishment
     * If 0 = not validated, if 1 = validated (so shown on page)
     * 
     * @Groups({"establishments_get_list", "districts_get_establishments", "establishment_get_data", "tags_get_establishments"})
     * 
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=OpeningTime::class, inversedBy="establishments")
     * @Groups({"establishments_get_list", "establishment_get_data"})
     */
    private $openingTime;
    

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->status = 0;
    }

    public function getId(): ?int
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOpeningDays(): ?string
    {
        return $this->opening_days;
    }

    public function setOpeningDays(?string $opening_days): self
    {
        $this->opening_days = $opening_days;

        return $this;
    }

    public function getNoonOpeningTime(): ?string
    {
        return $this->noon_opening_time;
    }

    public function setNoonOpeningTime(?string $noon_opening_time): self
    {
        $this->noon_opening_time = $noon_opening_time;

        return $this;
    }

    public function getEveningOpeningTime(): ?string
    {
        return $this->evening_opening_time;
    }

    public function setEveningOpeningTime(?string $evening_opening_time): self
    {
        $this->evening_opening_time = $evening_opening_time;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

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

    /**

     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setEstablishment($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getEstablishment() === $this) {
                $comment->setEstablishment(null);
            }
        }

        return $this;
    }

    public function getDistrict(): ?District
    {
        return $this->district;
    }

    /**
     * Set the value of district
     *
     * @return  self
     */ 
    public function setDistrict(?District $district): self

    {
        $this->district = $district;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addEstablishment($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeEstablishment($this);
        }

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getOpeningTime(): ?OpeningTime
    {
        return $this->openingTime;
    }

    public function setOpeningTime(?OpeningTime $openingTime): self
    {
        $this->openingTime = $openingTime;

        return $this;
    }
}
