<?php

namespace App\Entity;

use App\Repository\PoiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PoiRepository::class)
 */
class Poi
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $poiName;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $streetNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $streetName;
        
    /**
     * @ORM\Column(type="decimal", precision=10, scale=6, nullable=true)
     */
    private $poiGpsLat;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6, nullable=true)
     */
    private $poiGpsLng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poiSlug;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, mappedBy="pois")
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoiName(): ?string
    {
        return $this->poiName;
    }

    public function setPoiName(string $poiName): self
    {
        $this->poiName = $poiName;

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

    public function getStreetNumber(): ?string
    {
        return $this->streetNumber;
    }

    public function setStreetNumber(string $streetNumber): self
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    public function setStreetName(string $streetName): self
    {
        $this->streetName = $streetName;

        return $this;
    }
    
    public function getPoiGpsLat(): ?string
    {
        return $this->poiGpsLat;
    }

    public function setPoiGpsLat(?string $poiGpsLat): self
    {
        $this->poiGpsLat = $poiGpsLat;

        return $this;
    }

    public function getPoiGpsLng(): ?string
    {
        return $this->poiGpsLng;
    }

    public function setPoiGpsLng(?string $poiGpsLng): self
    {
        $this->poiGpsLng = $poiGpsLng;

        return $this;
    }

    public function getPoiSlug(): ?string
    {
        return $this->poiSlug;
    }

    public function setPoiSlug(?string $poiSlug): self
    {
        $this->poiSlug = $poiSlug;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAd = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addPoi($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removePoi($this);
        }

        return $this;
    }

}
