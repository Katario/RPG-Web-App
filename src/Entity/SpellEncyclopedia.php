<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SpellEncyclopediaRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: SpellEncyclopediaRepository::class)]
class SpellEncyclopedia extends Encyclopedia
{
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


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SpellEncyclopedia
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): SpellEncyclopedia
    {
        $this->description = $description;
        return $this;
    }

    public function getManaCost(): int
    {
        return $this->manaCost;
    }

    public function setManaCost(int $manaCost): SpellEncyclopedia
    {
        $this->manaCost = $manaCost;
        return $this;
    }
}