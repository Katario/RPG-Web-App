<?php

namespace App\Fixtures\DataFixtures\Factory;

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
     * @return array<bool|\DateTimeImmutable|int|string>
     */
    protected function defaults(): array
    {
        return [
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'currentHealthPoints' => self::faker()->numberBetween(50, 250),
            'currentManaPoints' => self::faker()->numberBetween(50, 250),
            'currentExhaustPoints' => self::faker()->numberBetween(50, 250),
            'currentActionPoints' => self::faker()->numberBetween(50, 250),
            'maxHealthPoints' => self::faker()->numberBetween(255, 500),
            'maxManaPoints' => self::faker()->numberBetween(255, 500),
            'maxExhaustPoints' => self::faker()->numberBetween(255, 500),
            'maxActionPoints' => self::faker()->numberBetween(255, 500),
            'name' => self::faker()->text(),
            'lastName' => self::faker()->text(),
            'level' => 1,
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
