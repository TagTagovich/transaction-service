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
    private $keyUtm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $valueUtm;

    /**
     * @ORM\ManyToOne(targetEntity=UtmSequence::class, inversedBy="utms", cascade={"persist"})
     */
    private $utmSequence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKeyUtm(): ?string
    {
        return $this->keyUtm;
    }

    public function setKeyUtm(string $keyUtm): self
    {
        $this->keyUtm = $keyUtm;

        return $this;
    }

    public function getValueUtm(): ?string
    {
        return $this->valueUtm;
    }

    public function setValueUtm(?string $valueUtm): self
    {
        $this->valueUtm = $valueUtm;

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
