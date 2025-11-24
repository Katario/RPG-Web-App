<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Item extends Encyclopedia
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
    private int $value;
    #[ORM\Column(type: 'integer')]
    private int $weight;
    #[ORM\Column(type: 'integer')]
    private int $currentDurabilityPoints = 0;
    #[ORM\Column(type: 'integer')]
    private int $maxDurabilityPoints = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Item
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Item
    {
        $this->description = $description;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): Item
    {
        $this->value = $value;

        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): Item
    {
        $this->weight = $weight;

        return $this;
    }

    public function getCurrentDurabilityPoints(): int
    {
        return $this->currentDurabilityPoints;
    }

    public function setCurrentDurabilityPoints(int $currentDurabilityPoints): void
    {
        $this->currentDurabilityPoints = $currentDurabilityPoints;
    }

    public function getMaxDurabilityPoints(): int
    {
        return $this->maxDurabilityPoints;
    }

    public function setMaxDurabilityPoints(int $maxDurabilityPoints): void
    {
        $this->maxDurabilityPoints = $maxDurabilityPoints;
    }
}
