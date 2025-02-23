<?php

namespace App\Tests\DataFixtures\Factory;

use App\Entity\NonPlayableCharacterTemplate;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<NonPlayableCharacterTemplate>
 */
final class NonPlayableCharacterTemplateFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return NonPlayableCharacterTemplate::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'isPrivate' => self::faker()->boolean(),
            'isReady' => self::faker()->boolean(),
            'maxAgility' => self::faker()->randomNumber(),
            'maxCharisma' => self::faker()->randomNumber(),
            'maxIntelligence' => self::faker()->randomNumber(),
            'maxStamina' => self::faker()->randomNumber(),
            'maxStrength' => self::faker()->randomNumber(),
            'minAgility' => self::faker()->randomNumber(),
            'minCharisma' => self::faker()->randomNumber(),
            'minIntelligence' => self::faker()->randomNumber(),
            'minStamina' => self::faker()->randomNumber(),
            'minStrength' => self::faker()->randomNumber(),
            'title' => self::faker()->text(),
            'updatedAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(NonPlayableCharacterTemplate $nonPlayableCharacterTemplate): void {})
        ;
    }
}
