<?php

declare(strict_types=1);

namespace App\Entity;
use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'string')]
    private string $ruleset;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'games')]
    #[JoinColumn(name: 'game_master', referencedColumnName: 'id')]
    private User $gameMaster;

    #[ORM\OneToMany(targetEntity: Character::class, mappedBy: 'game')]
    private Collection|array $characters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Game
    {
        $this->name = $name;
        return $this;
    }

    public function getRuleset(): string
    {
        return $this->ruleset;
    }

    public function setRuleset(string $ruleset): Game
    {
        $this->ruleset = $ruleset;
        return $this;
    }

    public function getGameMaster(): User
    {
        return $this->gameMaster;
    }

    public function setGameMaster(User $gameMaster): Game
    {
        $this->gameMaster = $gameMaster;
        return $this;
    }

    public function getCharacters(): Collection|array
    {
        return $this->characters;
    }

    public function setCharacters(Collection|array $characters): Game
    {
        $this->characters = $characters;
        return $this;
    }

    public function addCharacter(Character $character): Game
    {
        if (!$this->getCharacters($character)) {
            $this->characters->add($character);
        }
        return $this;
    }

    public function removeCharacter(Character $character): Game
    {
        if ($this->getCharacters()->contains($character)) {
            $this->characters->removeElement($character);
        }
        return $this;
    }
}