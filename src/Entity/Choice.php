<?php

namespace App\Entity;

use App\Repository\ChoiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChoiceRepository::class)]
class Choice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $choiceDescription = null;

    #[ORM\Column]
    private ?int $effectHp = null;

    #[ORM\Column]
    private ?int $effectStrength = null;

    #[ORM\Column]
    private ?int $effectAgility = null;

    #[ORM\Column]
    private ?int $effectIntelligence = null;

    #[ORM\Column]
    private ?int $effectWisdom = null;

    #[ORM\ManyToOne(targetEntity: Episode::class, inversedBy: 'choices')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Episode $episode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChoiceDescription(): ?string
    {
        return $this->choiceDescription;
    }

    public function setChoiceDescription(string $choiceDescription): static
    {
        $this->choiceDescription = $choiceDescription;

        return $this;
    }

    public function getEffectHp(): ?int
    {
        return $this->effectHp;
    }

    public function setEffectHp(int $effectHp): static
    {
        $this->effectHp = $effectHp;

        return $this;
    }

    public function getEffectStrength(): ?int
    {
        return $this->effectStrength;
    }

    public function setEffectStrength(int $effectStrength): static
    {
        $this->effectStrength = $effectStrength;

        return $this;
    }

    public function getEffectAgility(): ?int
    {
        return $this->effectAgility;
    }

    public function setEffectAgility(int $effectAgility): static
    {
        $this->effectAgility = $effectAgility;

        return $this;
    }

    public function getEffectIntelligence(): ?int
    {
        return $this->effectIntelligence;
    }

    public function setEffectIntelligence(int $effectIntelligence): static
    {
        $this->effectIntelligence = $effectIntelligence;

        return $this;
    }

    public function getEffectWisdom(): ?int
    {
        return $this->effectWisdom;
    }

    public function setEffectWisdom(int $effectWisdom): static
    {
        $this->effectWisdom = $effectWisdom;

        return $this;
    }

    public function getEpisode(): ?Episode
    {
        return $this->episode;
    }

    public function setEpisode(?Episode $episode): static
    {
        $this->episode = $episode;

        return $this;
    }
}
