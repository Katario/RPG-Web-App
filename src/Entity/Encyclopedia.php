<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class Encyclopedia
{
    #[ORM\Column(type: 'string')]
    private string $ruleset;
    #[ORM\OneToOne(targetEntity: User::class, mappedBy: 'encyclopedia')]
    private User $createdBy;
    #[ORM\Column(type: 'boolean')]
    private bool $isPrivate;

    public function getRuleset(): string
    {
        return $this->ruleset;
    }

    public function setRuleset(string $ruleset): Encyclopedia
    {
        $this->ruleset = $ruleset;
        return $this;
    }

    public function getCreatedBy(): User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(User $createdBy): Encyclopedia
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    public function isPrivate(): bool
    {
        return $this->isPrivate;
    }

    public function setIsPrivate(bool $isPrivate): Encyclopedia
    {
        $this->isPrivate = $isPrivate;
        return $this;
    }


}