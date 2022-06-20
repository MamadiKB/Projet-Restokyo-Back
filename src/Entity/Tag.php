<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"tags_get_list", "establishments_get_list", "establishments_get_validated", "establishment_get_data", "tag_get_data"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"tags_get_list", "establishments_get_list", "establishments_get_validated", "establishment_get_data", "tag_get_data"})
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Establishment::class, inversedBy="tags")
     * @Groups({"tag_get_data"})
     * 
     */
    private $establishments;

    public function __construct()
    {
        $this->establishments = new ArrayCollection();
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

    /**
     * @return Collection<int, Establishment>
     */
    public function getEstablishments(): Collection
    {
        return $this->establishments;
    }

    public function addEstablishment(Establishment $establishment): self
    {
        if (!$this->establishments->contains($establishment)) {
            $this->establishments[] = $establishment;
            
        }

        return $this;
    }

    public function removeEstablishment(Establishment $establishment): self
    {
        $this->establishments->removeElement($establishment);

        return $this;
    }
}
