<?php

namespace App\Entity;

use App\Repository\UrlsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UrlsRepository::class)
 */
class Urls
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $original;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shorter;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $visitas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOriginal(): ?string
    {
        return $this->original;
    }

    public function setOriginal(?string $original): self
    {
        $this->original = $original;

        return $this;
    }

    public function getShorter(): ?string
    {
        return $this->shorter;
    }

    public function setShorter(?string $shorter): self
    {
        $this->shorter = $shorter;

        return $this;
    }

    public function getVisitas(): ?int
    {
        return $this->visitas;
    }

    public function setVisitas(?int $visitas): self
    {
        $this->visitas = $visitas;

        return $this;
    }
}
