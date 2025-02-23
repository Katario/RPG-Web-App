<?php

declare(strict_types=1);

namespace App\Tests\DataFixtures;

use App\Tests\DataFixtures\Factory\GameFactory;
use App\Tests\DataFixtures\Factory\ItemFactory;
use App\Tests\DataFixtures\Factory\SkillFactory;
use App\Tests\DataFixtures\Factory\SpellFactory;
use App\Tests\DataFixtures\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create Users
        $mainAccount = UserFactory::createOne([
            'email' => 'katario@fixture.com',
            'username' => 'katario',
            'password' => 'test',
            'roles' => [],
        ]);

        $secondAccount = UserFactory::createOne([
            'email' => 'red@fixture.com',
            'username' => 'red',
            'password' => 'test',
            'roles' => [],
        ]);

        UserFactory::createMany(3);

        // Create Games
        GameFactory::createOne(['gameMaster' => $mainAccount]);
        GameFactory::createOne(['gameMaster' => $secondAccount]);

        // Create Items, Skills && Spells
        ItemFactory::createMany(10);
        SkillFactory::createMany(10);
        SpellFactory::createMany(10);

        // Create Armaments

        // Create Monsters

        // Create NPCs

        // Create Characters

        $manager->flush();
    }
}