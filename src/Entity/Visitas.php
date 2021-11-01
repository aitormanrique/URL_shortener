<?php

namespace App\Entity;

use App\Repository\VisitasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisitasRepository::class)
 */
class Visitas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $visitDate;

    /**
     * @ORM\ManyToOne(targetEntity=Urls::class, inversedBy="visitas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisitDate(): ?\DateTimeInterface
    {
        return $this->visitDate;
    }

    public function setVisitDate(\DateTimeInterface $visitDate): self
    {
        $this->visitDate = $visitDate;

        return $this;
    }

    public function getUrl(): ?Urls
    {
        return $this->url;
    }

    public function setUrl(?Urls $url): self
    {
        $this->url = $url;

        return $this;
    }
}
