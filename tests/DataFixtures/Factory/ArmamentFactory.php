<?php

namespace App\Tests\DataFixtures\Factory;

use App\Entity\Armament;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Armament>
 */
final class ArmamentFactory extends PersistentProxyObjectFactory
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
        return Armament::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'category' => self::faker()->text(),
            'currentDurability' => self::faker()->numberBetween(1, 10),
            'description' => self::faker()->text(),
            'maxDurability' => self::faker()->numberBetween(11, 20),
            'name' => self::faker()->text(),
            'value' => self::faker()->numberBetween(1, 10000),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Armament $armament): void {})
        ;
    }
}
