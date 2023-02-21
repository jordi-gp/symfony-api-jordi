<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\ArtistaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArtistaRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()
    ]
)]
class Artista
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 250)]
    #[Assert\Length(min: 2, max: 250)]
    private ?string $name = null;

    #[ORM\Column(length: 250)]
    #[Assert\NotBlank]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'artista', targetEntity: Vinilo::class)]
    #[Assert\NotBlank]
    private Collection $vinilos;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;
    public function __construct()
    {
        $this->vinilos = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Vinilo>
     */
    public function getVinilos(): Collection
    {
        return $this->vinilos;
    }

    public function addVinilo(Vinilo $vinilo): self
    {
        if (!$this->vinilos->contains($vinilo)) {
            $this->vinilos->add($vinilo);
            $vinilo->setArtista($this);
        }

        return $this;
    }

    public function removeVinilo(Vinilo $vinilo): self
    {
        if ($this->vinilos->removeElement($vinilo)) {
            // set the owning side to null (unless already changed)
            if ($vinilo->getArtista() === $this) {
                $vinilo->setArtista(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
