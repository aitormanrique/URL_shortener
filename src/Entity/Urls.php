<?php

namespace App\Entity;

use App\Repository\UrlsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=Visitas::class, mappedBy="url", orphanRemoval=true, cascade={"persist"})
     */
    private $visitas;

    public function __construct()
    {
        $this->visitas = new ArrayCollection();
    }

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

    /**
     * @return Collection|Visitas[]
     */
    public function getVisitas(): Collection
    {
        return $this->visitas;
    }

    public function addVisita(Visitas $visita): self
    {
        if (!$this->visitas->contains($visita)) {
            $this->visitas[] = $visita;
            $visita->setUrl($this);
        }

        return $this;
    }

    public function removeVisita(Visitas $visita): self
    {
        if ($this->visitas->removeElement($visita)) {
            // set the owning side to null (unless already changed)
            if ($visita->getUrl() === $this) {
                $visita->setUrl(null);
            }
        }

        return $this;
    }

}
