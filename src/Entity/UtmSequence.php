<?php

namespace App\Entity;

use App\Repository\UtmSequenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtmSequenceRepository::class)
 */
class UtmSequence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created = null;

    /**
     * @ORM\OneToMany(targetEntity=Utm::class, mappedBy="utmSequence", cascade={"persist"}, orphanRemoval=true)
     */
    private $utms;

    /**
     * @ORM\ManyToOne(targetEntity=Deal::class, inversedBy="utmSequences")
     */
    private $deal;

    public function __construct()
    {
        $this->utms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return Collection<int, Utm>
     */
    public function getUtms(): Collection
    {
        return $this->utms;
    }

    public function addUtm(Utm $utm): self
    {
        if (!$this->utms->contains($utm)) {
            $this->utms[] = $utm;
            $utm->setUtmSequence($this);
        }

        return $this;
    }

    public function removeUtm(Utm $utm): self
    {
        if ($this->utms->removeElement($utm)) {
            // set the owning side to null (unless already changed)
            if ($utm->getUtmSequence() === $this) {
                $utm->setUtmSequence(null);
            }
        }

        return $this;
    }

    public function getDeal(): ?Deal
    {
        return $this->deal;
    }

    public function setDeal(?Deal $deal): self
    {
        $this->deal = $deal;

        return $this;
    }
}
