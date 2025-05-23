<?php

declare(strict_types=1);

namespace App\Twig\Components\Molecule;

use App\Entity\Character;
use App\Entity\CharacterTemplate;
use App\Entity\Game;
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
    ) {
    }

    /**
     * @return Character[]
     */
    public function getCharacters(): array
    {
        if (null === $this->game) {
            return [];
        }

        return $this->characterRepository->findByGameBySearch(
            $this->game->getId(), '', 12
        );
    }

    /**
     * @return CharacterTemplate[]
     */
    public function getCharacterTemplates(): array
    {
        if (null === $this->game) {
            return [];
        }

        return $this->characterTemplateRepository->findBySearch(
            $this->query, 12
        );
    }
}
