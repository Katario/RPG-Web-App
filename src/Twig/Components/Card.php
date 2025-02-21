<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Card
{
    public string $variant = 'default';
    public string $show = '';
    public string $edit = '';
    public string $delete = '';
    public string $title = '';
    public string $subtitle = '';
    public string $imagePath = 'default';
    public bool $actions = true;

    public function getVariantClasses(): string
    {
        return match ($this->variant) {
            'default' => '',
            default => throw new \LogicException(sprintf('Unknown card type "%s"', $this->variant)),
        };
    }
}
