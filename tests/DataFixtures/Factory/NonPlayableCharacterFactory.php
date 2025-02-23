<?php

namespace App\Tests\DataFixtures\Factory;

use App\Entity\NonPlayableCharacter;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<NonPlayableCharacter>
 */
final class NonPlayableCharacterFactory extends PersistentProxyObjectFactory
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
        return NonPlayableCharacter::class;
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
            'currentAgility' => self::faker()->randomNumber(),
            'currentCharisma' => self::faker()->randomNumber(),
            'currentIntelligence' => self::faker()->randomNumber(),
            'currentStamina' => self::faker()->randomNumber(),
            'currentStrength' => self::faker()->randomNumber(),
            'maxAgility' => self::faker()->randomNumber(),
            'maxCharisma' => self::faker()->randomNumber(),
            'maxIntelligence' => self::faker()->randomNumber(),
            'maxStamina' => self::faker()->randomNumber(),
            'maxStrength' => self::faker()->randomNumber(),
            'name' => self::faker()->text(),
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
            // ->afterInstantiate(function(NonPlayableCharacter $nonPlayableCharacter): void {})
        ;
    }
}
