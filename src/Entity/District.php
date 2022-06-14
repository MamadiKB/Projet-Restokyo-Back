<?php

namespace App\Entity;

use App\Repository\DistrictRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DistrictRepository::class)
 */
class District
{
    public function __toString()
    {
        return $this->name;
    }
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"districts_get_list", "districts_get_establishments", "establishments_get_list", "establishment_get_data"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"establishment_get_data", "districts_get_list", "districts_get_establishments", "establishments_get_list"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Establishment::class, mappedBy="district")
     * @Groups({"districts_get_establishments"})
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
            $establishment->setDistrict($this);
        }

        return $this;
    }

    public function removeEstablishment(Establishment $establishment): self
    {
        if ($this->establishments->removeElement($establishment)) {
            // set the owning side to null (unless already changed)
            if ($establishment->getDistrict() === $this) {
                $establishment->setDistrict(null);
            }
        }

        return $this;
    }
}
