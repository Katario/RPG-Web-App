<?php

declare(strict_types=1);

namespace App\Twig\Components\Molecule;

use App\Entity\Armament;
use App\Entity\Character;
use App\Entity\CharacterTemplate;
use App\Entity\Game;
use App\Repository\ArmamentRepository;
use App\Repository\CharacterRepository;
use App\Repository\CharacterTemplateRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class CharacterBlock
{
    use DefaultActionTrait;

    #[LiveProp(writable: false)]
    public ?Game $game;

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(
        public CharacterRepository $characterRepository,
        public CharacterTemplateRepository $characterTemplateRepository,
    ) {}

    /**
     * @return Character[]
     */
    public function getCharacters(): array
    {
        if ($this->game === null) {
            return [];
        }

        return $this->characterRepository->findBySearch(
            '', 12
        );
    }

    /**
     * @return CharacterTemplate[]
     */
    public function getCharacterTemplates(): array
    {
        if ($this->game === null) {
            return [];
        }

        return $this->characterTemplateRepository->findBySearch(
            $this->query, 12
        );
    }
}