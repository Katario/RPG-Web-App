<?php

declare(strict_types=1);

namespace App\Entity;
use App\Controller\PlayableCharacterController;
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

    #[ORM\OneToMany(targetEntity: PlayableCharacter::class, mappedBy: 'game')]
    private Collection|array $playableCharacters;

    public function __construct()
    {
        $this->playableCharacters = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Game
    {
        $this->id = $id;

        return $this;
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

    public function getPlayableCharacters(): Collection|array
    {
        return $this->playableCharacters;
    }

    public function setPlayableCharacters(Collection|array $playableCharacters): Game
    {
        $this->playableCharacters = $playableCharacters;
        return $this;
    }

    public function addPlayableCharacter(PlayableCharacter $playableCharacter): Game
    {
        if (!$this->getPlayableCharacters($playableCharacter)) {
            $this->playableCharacters->add($playableCharacter);
        }
        return $this;
    }

    public function removePlayableCharacter(PlayableCharacter $playableCharacter): Game
    {
        if ($this->getPlayableCharacters()->contains($playableCharacter)) {
            $this->playableCharacters->removeElement($playableCharacter);
        }
        return $this;
    }
}