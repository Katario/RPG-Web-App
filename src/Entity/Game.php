<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

#[ORM\Entity(repositoryClass: GameRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Game
{
    use HasDateTimeTrait;
    use HasNoteTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'gameMasters')]
    #[JoinColumn(name: 'game_master', referencedColumnName: 'id')]
    private User $gameMaster;
    #[ORM\OneToMany(targetEntity: Character::class, mappedBy: 'game')]
    private Collection|array $characters;
    #[ORM\OneToMany(targetEntity: Armament::class, mappedBy: 'game')]
    private Collection|array $armaments;
    #[ORM\OneToMany(targetEntity: Monster::class, mappedBy: 'game')]
    private Collection|array $monsters;
    #[ORM\OneToMany(targetEntity: NonPlayableCharacter::class, mappedBy: 'game')]
    private Collection|array $nonPlayableCharacters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->armaments = new ArrayCollection();
        $this->monsters = new ArrayCollection();
        $this->nonPlayableCharacters = new ArrayCollection();
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
        if (!$this->getCharacters()->contains($character)) {
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

    public function getArmaments(): Collection|array
    {
        return $this->armaments;
    }

    public function setArmaments(Collection|array $armaments): Game
    {
        $this->armaments = $armaments;

        return $this;
    }

    public function addArmament(Armament $armament): Game
    {
        if (!$this->getArmaments()->contains($armament)) {
            $this->armaments->add($armament);
        }

        return $this;
    }

    public function removeArmament(Armament $armament): Game
    {
        if ($this->getArmaments()->contains($armament)) {
            $this->armaments->removeElement($armament);
        }

        return $this;
    }

    public function getMonsters(): Collection|array
    {
        return $this->monsters;
    }

    public function addMonster(Monster $monster): Game
    {
        if (!$this->getMonsters()->contains($monster)) {
            $this->monsters->add($monster);
        }

        return $this;
    }

    public function removeMonster(Monster $monster): Game
    {
        if ($this->getMonsters()->contains($monster)) {
            $this->monsters->removeElement($monster);
        }

        return $this;
    }

    public function getNonPlayableCharacters(): Collection|array
    {
        return $this->nonPlayableCharacters;
    }

    public function addNonPlayableCharacter(NonPlayableCharacter $nonPlayableCharacter): Game
    {
        if (!$this->getNonPlayableCharacters()->contains($nonPlayableCharacter)) {
            $this->nonPlayableCharacters->add($nonPlayableCharacter);
        }

        return $this;
    }

    public function removeNonPlayableCharacter(NonPlayableCharacter $nonPlayableCharacter): Game
    {
        if ($this->getNonPlayableCharacters()->contains($nonPlayableCharacter)) {
            $this->nonPlayableCharacters->removeElement($nonPlayableCharacter);
        }

        return $this;
    }
}
