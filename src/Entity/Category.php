<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=News::class, mappedBy="category")
     */
    private $news;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Funnystuffs::class, mappedBy="category")
     */
    private $funnystuffs;

    public function __construct()
    {
        $this->news = new ArrayCollection();
        $this->funnystuffs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|News[]
     */
    public function getNews(): Collection
    {
        return $this->news;
    }

    public function addNews(News $news): self
    {
        if (!$this->news->contains($news)) {
            $this->news[] = $news;
            $news->setCategory($this);
        }

        return $this;
    }

    public function removeNews(News $news): self
    {
        if ($this->news->removeElement($news)) {
            // set the owning side to null (unless already changed)
            if ($news->getCategory() === $this) {
                $news->setCategory(null);
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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    /**
     * @return Collection|Funnystuffs[]
     */
    public function getFunnystuffs(): Collection
    {
        return $this->funnystuffs;
    }

    public function addFunnystuff(Funnystuffs $funnystuff): self
    {
        if (!$this->funnystuffs->contains($funnystuff)) {
            $this->funnystuffs[] = $funnystuff;
            $funnystuff->setCategory($this);
        }

        return $this;
    }

    public function removeFunnystuff(Funnystuffs $funnystuff): self
    {
        if ($this->funnystuffs->removeElement($funnystuff)) {
            // set the owning side to null (unless already changed)
            if ($funnystuff->getCategory() === $this) {
                $funnystuff->setCategory(null);
            }
        }

        return $this;
    }
}
