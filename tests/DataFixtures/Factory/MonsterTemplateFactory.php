<?php

namespace App\Tests\DataFixtures\Factory;

use App\Entity\MonsterTemplate;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<MonsterTemplate>
 */
final class MonsterTemplateFactory extends PersistentProxyObjectFactory
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
        return MonsterTemplate::class;
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
            'name' => self::faker()->word(),
            'isPrivate' => self::faker()->boolean(),
            'isReady' => self::faker()->boolean(),
            'minHealthPoints' => self::faker()->numberBetween(50, 250),
            'minManaPoints' => self::faker()->numberBetween(50, 250),
            'minExhaustPoints' => self::faker()->numberBetween(50, 250),
            'minActionPoints' => self::faker()->numberBetween(50, 250),
            'minAgility' => self::faker()->numberBetween(1, 10),
            'minCharisma' => self::faker()->numberBetween(1, 10),
            'minIntelligence' => self::faker()->numberBetween(1, 10),
            'minStamina' => self::faker()->numberBetween(1, 10),
            'minStrength' => self::faker()->numberBetween(1, 10),
            'maxHealthPoints' => self::faker()->numberBetween(255, 500),
            'maxManaPoints' => self::faker()->numberBetween(255, 500),
            'maxExhaustPoints' => self::faker()->numberBetween(255, 500),
            'maxActionPoints' => self::faker()->numberBetween(255, 500),
            'maxAgility' => self::faker()->numberBetween(20, 30),
            'maxCharisma' => self::faker()->numberBetween(20, 30),
            'maxIntelligence' => self::faker()->numberBetween(20, 30),
            'maxStamina' => self::faker()->numberBetween(20, 30),
            'maxStrength' => self::faker()->numberBetween(20, 30),
            'updatedAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(MonsterTemplate $monsterTemplate): void {})
        ;
    }
}
