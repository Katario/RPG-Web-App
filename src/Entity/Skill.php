<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Skill extends Encyclopedia
{
    use HasDateTimeTrait;
    use HasNoteTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'text')]
    private string $description;
    #[ORM\Column(type: 'integer')]
    private int $exhaustPointCost;
    #[ORM\Column(type: 'integer')]
    private int $actionPointCost;
    // @TODO: replace by an array of Dice ValueObject, move damages in a Damage Model
    #[ORM\Column(type: 'string')]
    private string $diceValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Skill
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Skill
    {
        $this->description = $description;

        return $this;
    }

    public function getExhaustPointCost(): int
    {
        return $this->exhaustPointCost;
    }

    public function setExhaustPointCost(int $exhaustPointCost): Skill
    {
        $this->exhaustPointCost = $exhaustPointCost;

        return $this;
    }

    public function getActionPointCost(): int
    {
        return $this->actionPointCost;
    }

    public function setActionPointCost(int $actionPointCost): Skill
    {
        $this->actionPointCost = $actionPointCost;

        return $this;
    }

    public function getDiceValue(): string
    {
        return $this->diceValue;
    }

    public function setDiceValue(string $diceValue): Skill
    {
        $this->diceValue = $diceValue;

        return $this;
    }
}
