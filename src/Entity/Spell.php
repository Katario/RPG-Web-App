<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SpellRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpellRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Spell extends Encyclopedia
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
    private int $manaCost;
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

    public function setName(string $name): Spell
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Spell
    {
        $this->description = $description;

        return $this;
    }

    public function getManaCost(): int
    {
        return $this->manaCost;
    }

    public function setManaCost(int $manaCost): Spell
    {
        $this->manaCost = $manaCost;

        return $this;
    }

    public function getActionPointCost(): int
    {
        return $this->actionPointCost;
    }

    public function setActionPointCost(int $actionPointCost): Spell
    {
        $this->actionPointCost = $actionPointCost;

        return $this;
    }

    public function getDiceValue(): string
    {
        return $this->diceValue;
    }

    public function setDiceValue(string $diceValue): Spell
    {
        $this->diceValue = $diceValue;

        return $this;
    }
}
