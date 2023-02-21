<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\ViniloRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ViniloRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection,
        new Post(),
        new Put(),
        new Delete()
    ],
    normalizationContext: ['groups' => ['user:read']],
    denormalizationContext: ['groups' => ['user:write']],
    filters: ['vinil.search_filter', 'vinil.date_filter', 'vinil.artist_filter'],
)]
##[ApiFilter(SearchFilter::class, properties: ['vinil.artista' => 'exact'])]
class Vinilo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['user:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    #[Assert\Length(min: 2, max: 150)]
    #[Groups(['user:write', 'user:read'])]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'vinilos')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['user:write', 'user:read'])]
    #[Assert\NotBlank]
    private ?Artista $artista = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Groups(['user:write', 'user:read'])]
    private ?int $price = null;

    #[ORM\Column(length: 250)]
    #[Assert\NotBlank]
    #[Groups(['user:write', 'user:read'])]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank]
    #[Groups(['user:read'])]
    private ?\DateTimeInterface $createdAt = null;

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

    public function getArtista(): ?Artista
    {
        return $this->artista;
    }

    public function setArtista(?Artista $artista): self
    {
        $this->artista = $artista;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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
