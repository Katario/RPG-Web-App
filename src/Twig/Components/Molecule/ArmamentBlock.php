<?php

declare(strict_types=1);

namespace App\Twig\Components\Molecule;

use App\Entity\Armament;
use App\Entity\ArmamentTemplate;
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

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(
        public ArmamentRepository $armamentRepository,
        public ArmamentTemplateRepository $armamentTemplateRepository,
    ) {
    }

    /**
     * @return Armament[]
     */
    public function getArmaments(): array
    {
        if (null === $this->game) {
            return [];
        }

        return $this->armamentRepository->findBySearch(
            '', 12
        );
    }

    /**
     * @return ArmamentTemplate[]
     */
    public function getArmamentTemplates(): array
    {
        if (null === $this->game) {
            return [];
        }

        return $this->armamentTemplateRepository->findBySearch(
            $this->query, 12
        );
    }
}
