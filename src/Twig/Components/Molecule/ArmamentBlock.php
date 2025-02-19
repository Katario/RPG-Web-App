<?php

declare(strict_types=1);

namespace App\Twig\Components\Molecule;

use App\Entity\Armament;
use App\Entity\Game;
use App\Repository\ArmamentRepository;
use App\Repository\ArmamentTemplateRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class ArmamentBlock
{
    use DefaultActionTrait;

    #[LiveProp(writable: false)]
    public ?Game $game;

    public function __construct(
        public ArmamentRepository $armamentRepository
    ) {}

    /**
     * @return Armament[]
     */
    public function getArmaments(): array
    {
        if ($this->game === null) {
            return [];
        }

        return $this->armamentRepository->findBy(['game' => $this->game]);
    }
}