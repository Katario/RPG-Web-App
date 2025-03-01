<?php

namespace App\Tests\DataFixtures\Factory;

use App\Entity\Monster;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Monster>
 */
final class MonsterFactory extends PersistentProxyObjectFactory
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
        return Monster::class;
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
            'currentHealthPoints' => self::faker()->numberBetween(50, 250),
            'currentManaPoints' => self::faker()->numberBetween(50, 250),
            'currentExhaustPoints' => self::faker()->numberBetween(50, 250),
            'currentActionPoints' => self::faker()->numberBetween(50, 250),
            'maxHealthPoints' => self::faker()->numberBetween(255, 500),
            'maxManaPoints' => self::faker()->numberBetween(255, 500),
            'maxExhaustPoints' => self::faker()->numberBetween(255, 500),
            'maxActionPoints' => self::faker()->numberBetween(255, 500),
            'agility' => self::faker()->numberBetween(20, 30),
            'charisma' => self::faker()->numberBetween(20, 30),
            'intelligence' => self::faker()->numberBetween(20, 30),
            'stamina' => self::faker()->numberBetween(20, 30),
            'strength' => self::faker()->numberBetween(20, 30),
            'name' => self::faker()->text(),
            'kind' => self::faker()->text(),
            'level' => 1,
            'isBoss' => self::faker()->boolean(),
            'updatedAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Monster $monster): void {})
        ;
    }
}
