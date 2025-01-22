<?php

namespace App\Entity;

use App\Repository\NonPlayableCharacterEncyclopediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NonPlayableCharacterEncyclopediaRepository::class)]
class NonPlayableCharacterEncyclopedia extends Encyclopedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
