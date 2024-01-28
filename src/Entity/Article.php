<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[Broadcast]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $Title = null;

    #[ORM\Column(length: 205)]
    private ?string $TitleSlug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Content = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateCreate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateUpdate = null;

    #[ORM\Column]
    private ?bool $IsPublished = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getTitleSlug(): ?string
    {
        return $this->TitleSlug;
    }

    public function setTitleSlug(string $TitleSlug): static
    {
        $this->TitleSlug = $TitleSlug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(string $Content): static
    {
        $this->Content = $Content;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->DateCreate;
    }

    public function setDateCreate(\DateTimeInterface $DateCreate): static
    {
        $this->DateCreate = $DateCreate;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->DateUpdate;
    }

    public function setDateUpdate(?\DateTimeInterface $DateUpdate): static
    {
        $this->DateUpdate = $DateUpdate;

        return $this;
    }

    public function isIsPublished(): ?bool
    {
        return $this->IsPublished;
    }

    public function setIsPublished(bool $IsPublished): static
    {
        $this->IsPublished = $IsPublished;

        return $this;
    }
}
