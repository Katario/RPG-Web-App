<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\KindRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KindRepository::class)]
class Kind extends Encyclopedia
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

    public function setId(?int $id): Kind
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Kind
    {
        $this->name = $name;

        return $this;
    }
}
