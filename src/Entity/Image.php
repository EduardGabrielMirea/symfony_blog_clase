<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $files = null;

    #[ORM\Column]
    private ?int $numLikes = null;

    #[ORM\Column]
    private ?int $numViews = null;

    #[ORM\Column]
    private ?int $numDownloads = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    private ?Category $category = null;

    public function __construct()
    {
        $this->numLikes = 0;
        $this->numViews = 0;
        $this->numDownloads = 0;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFiles(): ?string
    {
        return $this->files;
    }

    public function setFiles(string $files): self
    {
        $this->files = $files;

        return $this;
    }

    public function getNumLikes(): ?int
    {
        return $this->numLikes;
    }

    public function setNumLikes(int $numLikes): self
    {
        $this->numLikes = $numLikes;

        return $this;
    }

    public function getNumViews(): ?int
    {
        return $this->numViews;
    }

    public function setNumViews(int $numViews): self
    {
        $this->numViews = $numViews;

        return $this;
    }

    public function getNumDownloads(): ?int
    {
        return $this->numDownloads;
    }

    public function setNumDownloads(int $numDownloads): self
    {
        $this->numDownloads = $numDownloads;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
