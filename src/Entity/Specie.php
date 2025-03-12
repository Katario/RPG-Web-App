<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SpecieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecieRepository::class)]
class Specie extends Encyclopedia
{
    use HasDateTimeTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string', length: 100)]
    private string $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Specie
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Specie
    {
        $this->name = $name;

        return $this;
    }
}
