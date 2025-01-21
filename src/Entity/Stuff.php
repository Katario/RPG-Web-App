<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\StuffRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StuffRepository::class)]
class Stuff
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'string')]
    private string $type;

    #[ORM\Column(type: 'integer')]
    private int $value;

    #[ORM\Column(type: 'integer')]
    private int $durability;

    #[ORM\Column(type: 'integer')]
    private int $maxDurability;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Stuff
    {
        $this->name = $name;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Stuff
    {
        $this->type = $type;
        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): Stuff
    {
        $this->value = $value;
        return $this;
    }

    public function getDurability(): int
    {
        return $this->durability;
    }

    public function setDurability(int $durability): Stuff
    {
        $this->durability = $durability;
        return $this;
    }

    public function getMaxDurability(): int
    {
        return $this->maxDurability;
    }

    public function setMaxDurability(int $maxDurability): Stuff
    {
        $this->maxDurability = $maxDurability;
        return $this;
    }
}