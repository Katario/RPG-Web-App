<?php

namespace App\Tests\DataFixtures\Factory;

use App\Entity\ArmamentTemplate;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<ArmamentTemplate>
 */
final class ArmamentTemplateFactory extends PersistentProxyObjectFactory
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
        return ArmamentTemplate::class;
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
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'description' => self::faker()->text(),
            'isPrivate' => self::faker()->boolean(),
            'isReady' => self::faker()->boolean(),
            'maxDurability' => self::faker()->numberBetween(0, 100),
            'minDurability' => self::faker()->numberBetween(0, 100),
            'name' => self::faker()->text(),
            'updatedAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'weight' => self::faker()->randomNumber(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(ArmamentTemplate $armamentTemplate): void {})
        ;
    }
}
