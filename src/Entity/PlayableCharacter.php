<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PlayableCharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayableCharacterRepository::class)]
class PlayableCharacter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $lastName;

    #[ORM\Column(type: 'string')]
    private string $title;

    #[ORM\Column(type: 'integer')]
    private int $currentLevel;

    #[ORM\Column(type: 'integer')]
    private int $healthPoints;

    #[ORM\Column(type: 'integer')]
    private int $maxHealthPoints;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'playableCharacters')]
    #[ORM\JoinColumn(name: 'userId', referencedColumnName: 'id')]
    private User $user;

    #[ORM\ManyToOne(targetEntity: Game::class, inversedBy: 'playableCharacters')]
    #[ORM\JoinColumn(name: 'gameId', referencedColumnName: 'id')]
    private Game $game;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): PlayableCharacter
    {
        $this->name = $name;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): PlayableCharacter
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): PlayableCharacter
    {
        $this->title = $title;
        return $this;
    }

    public function getCurrentLevel(): int
    {
        return $this->currentLevel;
    }

    public function setCurrentLevel(int $currentLevel): PlayableCharacter
    {
        $this->currentLevel = $currentLevel;
        return $this;
    }

    public function getHealthPoints(): int
    {
        return $this->healthPoints;
    }

    public function setHealthPoints(int $healthPoints): PlayableCharacter
    {
        $this->healthPoints = $healthPoints;
        return $this;
    }

    public function getMaxHealthPoints(): int
    {
        return $this->maxHealthPoints;
    }

    public function setMaxHealthPoints(int $maxHealthPoints): PlayableCharacter
    {
        $this->maxHealthPoints = $maxHealthPoints;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): PlayableCharacter
    {
        $this->user = $user;
        return $this;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function setGame(Game $game): PlayableCharacter
    {
        $this->game = $game;
        return $this;
    }

}