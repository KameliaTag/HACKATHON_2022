<?php

namespace App\Entity;

use App\Repository\TemplateConfigRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TemplateConfigRepository::class)
 */
class TemplateConfig
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
    private $lable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clonne;

    /**
     * @ORM\ManyToOne(targetEntity=Template::class, inversedBy="templateConfig")
     * @ORM\JoinColumn(nullable=false)
     */
    private $template;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLable(): ?string
    {
        return $this->lable;
    }

    public function setLable(string $lable): self
    {
        $this->lable = $lable;

        return $this;
    }

    public function getClonne(): ?string
    {
        return $this->clonne;
    }

    public function setClonne(string $clonne): self
    {
        $this->clonne = $clonne;

        return $this;
    }

    public function getTemplate(): ?Template
    {
        return $this->template;
    }

    public function setTemplate(?Template $template): self
    {
        $this->template = $template;

        return $this;
    }
}
