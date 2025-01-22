<?php

namespace App\Entity;

use App\Repository\SkillEncyclopediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillEncyclopediaRepository::class)]
class SkillEncyclopedia extends Encyclopedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'text')]
    private string $description;
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $manaCost = null;
    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $physicalCost = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SkillEncyclopedia
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): SkillEncyclopedia
    {
        $this->description = $description;
        return $this;
    }

    public function getManaCost(): ?int
    {
        return $this->manaCost;
    }

    public function setManaCost(?int $manaCost): SkillEncyclopedia
    {
        $this->manaCost = $manaCost;
        return $this;
    }

    public function getPhysicalCost(): ?int
    {
        return $this->physicalCost;
    }

    public function setPhysicalCost(?int $physicalCost): SkillEncyclopedia
    {
        $this->physicalCost = $physicalCost;
        return $this;
    }
}
