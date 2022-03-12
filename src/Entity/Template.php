<?php

namespace App\Entity;
use App\Entity\Traits\TimestampTrait;
use App\Repository\TemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TemplateRepository::class)
 */
class Template
{
    use TimestampTrait; 
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
     * @ORM\OneToMany(targetEntity=TemplateConfig::class, mappedBy="template", orphanRemoval=true)
     */
    private $templateConfig;

    /**
     * @ORM\OneToMany(targetEntity=Component::class, mappedBy="template")
     */
    private $template;

    public function __construct()
    {
        $this->templateConfig = new ArrayCollection();
        $this->template = new ArrayCollection();
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

    /**
     * @return Collection<int, Component>
     */
    public function getTemplate(): Collection
    {
        return $this->template;
    }

    public function addTemplate(Component $template): self
    {
        if (!$this->template->contains($template)) {
            $this->template[] = $template;
            $template->setTemplate($this);
        }

        return $this;
    }

    public function removeTemplate(Component $template): self
    {
        if ($this->template->removeElement($template)) {
            // set the owning side to null (unless already changed)
            if ($template->getTemplate() === $this) {
                $template->setTemplate(null);
            }
        }

        return $this;
    }
}
