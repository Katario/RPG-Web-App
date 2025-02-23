<?php

namespace App\Tests\DataFixtures\Factory;

use App\Entity\Character;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Character>
 */
final class CharacterFactory extends PersistentProxyObjectFactory
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
        return Character::class;
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
            // ->afterInstantiate(function(Character $character): void {})
        ;
    }
}
