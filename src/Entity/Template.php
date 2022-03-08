<?php

namespace App\Entity;

use App\Repository\TemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TemplateRepository::class)
 */
class Template
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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=TemplateConfig::class, mappedBy="template", orphanRemoval=true)
     */
    private $templateConfig;

    public function __construct()
    {
        $this->templateConfig = new ArrayCollection();
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, TemplateConfig>
     */
    public function getTemplateConfig(): Collection
    {
        return $this->templateConfig;
    }

    public function addTemplateConfig(TemplateConfig $templateConfig): self
    {
        if (!$this->templateConfig->contains($templateConfig)) {
            $this->templateConfig[] = $templateConfig;
            $templateConfig->setTemplate($this);
        }

        return $this;
    }

    public function removeTemplateConfig(TemplateConfig $templateConfig): self
    {
        if ($this->templateConfig->removeElement($templateConfig)) {
            // set the owning side to null (unless already changed)
            if ($templateConfig->getTemplate() === $this) {
                $templateConfig->setTemplate(null);
            }
        }

        return $this;
    }
}
