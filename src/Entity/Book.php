<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 13, unique: true)]
    #[Assert\NotBlank(message: "L’ISBN est obligatoire.")]
    #[Assert\Length(
        min: 13,
        max: 13,
        exactMessage: "L’ISBN doit comporter exactement 13 chiffres."
    )]
    #[Assert\Regex(
        pattern: "/^\d{13}$/",
        message: "L’ISBN doit contenir uniquement des chiffres."
    )]
    private ?string $isbn = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "Le titre du livre est obligatoire.")]
    #[Assert\Length(
        max: 100,
        maxMessage: "Le titre ne peut pas dépasser 100 caractères."
    )]
    private ?string $title = null;

    #[ORM\Column(type: "text", nullable: true)]
    #[Assert\Length(
        max: 2000,
        maxMessage: "Le résumé ne peut pas dépasser 2000 caractères."
    )]
    private ?string $summary = null;

    #[ORM\Column(type: "integer", nullable: true)]
    #[Assert\Positive(message: "L’année de publication doit être un nombre positif.")]
    #[Assert\Range(
        min: 1400,
        max: 2100,
        notInRangeMessage: "L’année de publication doit être comprise entre {{ min }} et {{ max }}."
    )]
    private ?int $publicationYear = null;

    #[ORM\Column(type: "datetime_immutable")]
    #[Assert\NotNull(message: "La date de création est obligatoire.")]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: "datetime_immutable", nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    // 🔗 Relation optionnelle avec un utilisateur (propriétaire, emprunteur, etc.)
    #[ORM\ManyToOne(targetEntity: User::class)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): static
    {
        $this->isbn = $isbn;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): static
    {
        $this->summary = $summary;
        return $this;
    }

    public function getPublicationYear(): ?int
    {
        return $this->publicationYear;
    }

    public function setPublicationYear(?int $publicationYear): static
    {
        $this->publicationYear = $publicationYear;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
        return $this;
    }
}
