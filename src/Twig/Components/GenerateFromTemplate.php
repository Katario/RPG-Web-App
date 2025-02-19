<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Entity\ArmamentTemplate;
use App\Repository\ArmamentTemplateRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class GenerateFromTemplate
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(
        private readonly ArmamentTemplateRepository $armamentTemplateRepository,
    ) {}

    /** @return ArmamentTemplate[] */
    public function getArmamentTemplates(): array
    {
        if (!$this->query) {
            return [];
        }

        return $this->armamentTemplateRepository->findBySearch(
            $this->query, 12
        );
    }
}