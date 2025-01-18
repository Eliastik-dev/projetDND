<?php

namespace App\Entity;

use App\Repository\StoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StoryRepository::class)]
class Story
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $storyDescription = null;

    #[ORM\OneToMany(mappedBy: 'story', targetEntity: Episode::class, cascade: ['persist', 'remove'])]
    private Collection $episodes;

    #[ORM\OneToOne(mappedBy: 'story', targetEntity: Race::class)]
    private ?Race $race = null;

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): static
    {
        $this->race = $race;

        return $this;
    }

    public function __construct()
    {
        $this->episodes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStoryDescription(): ?string
    {
        return $this->storyDescription;
    }

    public function setStoryDescription(string $storyDescription): static
    {
        $this->storyDescription = $storyDescription;

        return $this;
    }

    public function getEpisodes(): Collection
    {
        return $this->episodes;
    }

    public function addEpisode(Episode $episode): static
    {
        if (!$this->episodes->contains($episode)) {
            $this->episodes->add($episode);
            $episode->setStory($this);
        }

        return $this;
    }

    public function removeEpisode(Episode $episode): static
    {
        if ($this->episodes->removeElement($episode)) {
            if ($episode->getStory() === $this) {
                $episode->setStory(null);
            }
        }

        return $this;
    }
}
