<?php

namespace App\Entity;

use App\Repository\ArmamentEncyclopediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmamentEncyclopediaRepository::class)]
class ArmamentEncyclopedia extends Encyclopedia
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
