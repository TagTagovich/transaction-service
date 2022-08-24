<?php

namespace App\Entity;

use App\Repository\UtmRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtmRepository::class)
 */
class Utm
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
    private $key;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=UtmSequence::class, inversedBy="utms")
     */
    private $utmSequence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getUtmSequence(): ?UtmSequence
    {
        return $this->utmSequence;
    }

    public function setUtmSequence(?UtmSequence $utmSequence): self
    {
        $this->utmSequence = $utmSequence;

        return $this;
    }
}
