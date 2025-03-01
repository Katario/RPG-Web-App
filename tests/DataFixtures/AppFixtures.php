<?php

declare(strict_types=1);

namespace App\Tests\DataFixtures;

use App\Tests\DataFixtures\Factory\ArmamentFactory;
use App\Tests\DataFixtures\Factory\ArmamentTemplateFactory;
use App\Tests\DataFixtures\Factory\CharacterFactory;
use App\Tests\DataFixtures\Factory\CharacterTemplateFactory;
use App\Tests\DataFixtures\Factory\GameFactory;
use App\Tests\DataFixtures\Factory\ItemFactory;
use App\Tests\DataFixtures\Factory\MonsterFactory;
use App\Tests\DataFixtures\Factory\MonsterTemplateFactory;
use App\Tests\DataFixtures\Factory\NonPlayableCharacterFactory;
use App\Tests\DataFixtures\Factory\NonPlayableCharacterTemplateFactory;
use App\Tests\DataFixtures\Factory\SkillFactory;
use App\Tests\DataFixtures\Factory\SpellFactory;
use App\Tests\DataFixtures\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // 1. Create Users
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

        $thirdAccount = UserFactory::createOne([
            'email' => 'blue@fixture.com',
            'username' => 'blue',
            'password' => 'test',
            'roles' => [],
        ]);

        $fourthAccount = UserFactory::createOne([
            'email' => 'green@fixture.com',
            'username' => 'green',
            'password' => 'test',
            'roles' => [],
        ]);

        UserFactory::createMany(3);

        // 2. Create Games
        $mainGame = GameFactory::createOne([
            'gameMaster' => $mainAccount,
            'name' => 'First Game',
        ]);

        $secondGame = GameFactory::createOne([
            'gameMaster' => $secondAccount,
            'name' => 'Second Game',
        ]);

        // 3. Fill Encyclopedia
        // 3.1. Create Items, Skills && Spells
        ItemFactory::createMany(10,
        static function (int $incremental) {
            return ['name' => 'Item ' . $incremental];
        });

        SkillFactory::createMany(10,
        static function (int $incremental) {
            return ['name' => 'Skill ' . $incremental];
        });

        SpellFactory::createMany(10,
        static function (int $incremental) {
            return ['name' => 'Spell ' . $incremental];
        });

        // 3.2. Create Armaments Templates
        ArmamentTemplateFactory::new()
            ->many(5)
            ->create(static function (int $incremental) {
                return [
                    'name' => 'Armament Template ' . $incremental,
                    'spells' => SpellFactory::randomRange(0, 3),
                    'skills' => SkillFactory::randomRange(0, 3),
                ];
            })
        ;

        // 3.3. Create Characters, NPCs and Monsters Templates
        CharacterTemplateFactory::new()
            ->many(5)
            ->create(static function (int $incremental) {
                return [
                    'title' => 'Character Template ' . $incremental,
                    'spells' => SpellFactory::randomRange(0, 3),
                    'skills' => SkillFactory::randomRange(0, 3),
                    'items' => ItemFactory::randomRange(0, 3),
                ];
            })
        ;
        NonPlayableCharacterTemplateFactory::new()
            ->many(5)
            ->create(static function (int $incremental) {
                return [
                    'title' => 'NonPlayableCharacter Template ' . $incremental,
                    'spells' => SpellFactory::randomRange(0, 3),
                    'skills' => SkillFactory::randomRange(0, 3),
                    'items' => ItemFactory::randomRange(0, 3),
                ];
            })
        ;
        MonsterTemplateFactory::new()
            ->many(5)
            ->create(static function (int $incremental) {
                return [
                    'kind' => 'Monster Template ' . $incremental,
                    'spells' => SpellFactory::randomRange(0, 3),
                    'skills' => SkillFactory::randomRange(0, 3),
                    'items' => ItemFactory::randomRange(0, 3),
                ];
            })
        ;

        // 4. Create Fake Data
        // 4.1. Create Characters
        $characterRed = CharacterFactory::createOne([
            'user' => $secondAccount,
            'game' => $mainGame,
            'name' => 'Character of Red',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);
        $characterBlue = CharacterFactory::createOne([
            'user' => $thirdAccount,
            'game' => $mainGame,
            'name' => 'Character of Blue',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);
        $characterGreen = CharacterFactory::createOne([
            'user' => $fourthAccount,
            'game' => $mainGame,
            'name' => 'Character of Green',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        // 4.2. Create NPCs
        NonPlayableCharacterFactory::createMany(
            5,
            static function (int $incremental) use ($mainGame) {
                return [
                    'game' => $mainGame,
                    'name' => 'NonPlayableCharacter ' . $incremental,
                    'spells' => SpellFactory::randomRange(0, 3),
                    'skills' => SkillFactory::randomRange(0, 3),
                    'items' => ItemFactory::randomRange(0, 3),
                ];
            });

        // 4.3. Create Monsters
        MonsterFactory::createMany(
            5,
            static function (int $incremental) use ($mainGame) {
                return [
                    'game' => $mainGame,
                    'name' => 'Monster ' . $incremental,
                    'spells' => SpellFactory::randomRange(0, 3),
                    'skills' => SkillFactory::randomRange(0, 3),
                    'items' => ItemFactory::randomRange(0, 3),
                ];
            });

        // 4.4. Create Armaments
        ArmamentFactory::createOne([
            'name' => 'Armament Without owner',
            'game' => $mainGame,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);
        ArmamentFactory::createOne([
            'name' => 'Armament Monster',
            'game' => $mainGame,
            'monster' => MonsterFactory::random(),
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);
        ArmamentFactory::createOne([
            'name' => 'Armament NPC',
            'game' => $mainGame,
            'nonPlayableCharacter' => NonPlayableCharacterFactory::random(),
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);
        ArmamentFactory::createOne([
            'name' => 'Armament Red 1',
            'game' => $mainGame,
            'character' => $characterRed,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);
        ArmamentFactory::createOne([
            'name' => 'Armament Red 2',
            'game' => $mainGame,
            'character' => $characterRed,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);
        ArmamentFactory::createOne([
            'name' => 'Armament Green',
            'game' => $mainGame,
            'character' => $characterGreen,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);

        $manager->flush();
    }
}