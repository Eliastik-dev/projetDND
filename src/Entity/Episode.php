<?php

namespace App\Entity;

use App\Repository\EpisodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodeRepository::class)]
class Episode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $episodeDescription = null;

    #[ORM\ManyToOne(targetEntity: Story::class, inversedBy: 'episodes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Story $story = null;

    #[ORM\OneToMany(mappedBy: 'episode', targetEntity: Choice::class, cascade: ['persist', 'remove'])]
    private Collection $choices;

    public function __construct()
    {
        $this->choices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEpisodeDescription(): ?string
    {
        return $this->episodeDescription;
    }

    public function setEpisodeDescription(string $episodeDescription): static
    {
        $this->episodeDescription = $episodeDescription;

        return $this;
    }

    public function getStory(): ?Story
    {
        return $this->story;
    }

    public function setStory(?Story $story): static
    {
        $this->story = $story;

        return $this;
    }

    public function getChoices(): Collection
    {
        return $this->choices;
    }

    public function addChoice(Choice $choice): static
    {
        if (!$this->choices->contains($choice)) {
            $this->choices->add($choice);
            $choice->setEpisode($this);
        }

        return $this;
    }

    public function removeChoice(Choice $choice): static
    {
        if ($this->choices->removeElement($choice)) {
            if ($choice->getEpisode() === $this) {
                $choice->setEpisode(null);
            }
        }

        return $this;
    }
}
