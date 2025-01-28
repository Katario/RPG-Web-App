<?php

declare(strict_types=1);

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

abstract class AbstractEncyclopedia
{
    #[ORM\Column(type: 'boolean')]
    protected bool $isReady;

    public function isReady(): bool
    {
        return $this->isReady;
    }

    public function setIsReady(bool $isReady): AbstractEncyclopedia
    {
        $this->isReady = $isReady;
        return $this;
    }
}