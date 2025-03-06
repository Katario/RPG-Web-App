<?php

declare(strict_types=1);

namespace App\Twig\Components\Molecule;

use App\Entity\Game;
use App\Entity\NonPlayableCharacter;
use App\Entity\NonPlayableCharacterTemplate;
use App\Repository\NonPlayableCharacterRepository;
use App\Repository\NonPlayableCharacterTemplateRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class NonPlayableCharacterBlock
{
    use DefaultActionTrait;

    #[LiveProp(writable: false)]
    public ?Game $game;

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(
        public NonPlayableCharacterRepository $nonPlayableCharacterRepository,
        public NonPlayableCharacterTemplateRepository $nonPlayableCharacterTemplateRepository,
    ) {
    }

    /**
     * @return NonPlayableCharacter[]
     */
    public function getNonPlayableCharacters(): array
    {
        if (null === $this->game) {
            return [];
        }

        return $this->nonPlayableCharacterRepository->findByGameBySearch(
            $this->game->getId(), '', 12
        );
    }

    /**
     * @return NonPlayableCharacterTemplate[]
     */
    public function getNonPlayableCharacterTemplates(): array
    {
        if (null === $this->game) {
            return [];
        }

        return $this->nonPlayableCharacterTemplateRepository->findBySearch(
            $this->query, 12
        );
    }
}
