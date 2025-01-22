<?php

namespace App\Entity;

use App\Repository\ItemEncyclopediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemEncyclopediaRepository::class)]
class ItemEncyclopedia extends Encyclopedia
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
