<?php

declare(strict_types=1);

namespace App\Twig\Components\Molecule;

use App\Entity\Game;
use App\Entity\Monster;
use App\Entity\MonsterTemplate;
use App\Repository\MonsterRepository;
use App\Repository\MonsterTemplateRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class MonsterBlock
{
    use DefaultActionTrait;

    #[LiveProp(writable: false)]
    public ?Game $game;

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(
        public MonsterRepository $monsterRepository,
        public MonsterTemplateRepository $monsterTemplateRepository,
    ) {}

    /**
     * @return Monster[]
     */
    public function getMonsters(): array
    {
        if ($this->game === null) {
            return [];
        }

        return $this->monsterRepository->findBySearch(
            '', 12
        );
    }

    /**
     * @return MonsterTemplate[]
     */
    public function getMonsterTemplates(): array
    {
        if ($this->game === null) {
            return [];
        }

        return $this->monsterTemplateRepository->findBySearch(
            $this->query, 12
        );
    }

}