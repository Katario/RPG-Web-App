<?php

declare(strict_types=1);

namespace App\Tests\DataFixtures;

use App\Tests\DataFixtures\Factory\ArmamentFactory;
use App\Tests\DataFixtures\Factory\ArmamentTemplateFactory;
use App\Tests\DataFixtures\Factory\CharacterClassFactory;
use App\Tests\DataFixtures\Factory\CharacterFactory;
use App\Tests\DataFixtures\Factory\CharacterTemplateFactory;
use App\Tests\DataFixtures\Factory\GameFactory;
use App\Tests\DataFixtures\Factory\ItemFactory;
use App\Tests\DataFixtures\Factory\KindFactory;
use App\Tests\DataFixtures\Factory\MonsterFactory;
use App\Tests\DataFixtures\Factory\MonsterTemplateFactory;
use App\Tests\DataFixtures\Factory\NonPlayableCharacterFactory;
use App\Tests\DataFixtures\Factory\NonPlayableCharacterTemplateFactory;
use App\Tests\DataFixtures\Factory\SkillFactory;
use App\Tests\DataFixtures\Factory\SpellFactory;
use App\Tests\DataFixtures\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class InitialFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['initial'];
    }

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
        // 3.1. Create Kind, CharacterClass, Items, Skills && Spells
        $human = KindFactory::createOne([
            'name' => 'Human',
        ]);
        $elf = KindFactory::createOne([
            'name' => 'Elf',
        ]);
        $dwarf = KindFactory::createOne([
            'name' => 'Dwarf',
        ]);
        $orc = KindFactory::createOne([
            'name' => 'Orc',
        ]);
        $warrior = CharacterClassFactory::createOne([
            'name' => 'Warrior',
        ]);
        $magician = CharacterClassFactory::createOne([
            'name' => 'Magician',
        ]);
        $priest = CharacterClassFactory::createOne([
            'name' => 'Priest',
        ]);
        $hunter = CharacterClassFactory::createOne([
            'name' => 'Hunter',
        ]);
        ItemFactory::createOne([
            'name' => 'Healing Potion',
        ]);
        ItemFactory::createOne([
            'name' => 'Poison Potion',
        ]);
        ItemFactory::createOne([
            'name' => 'Burning Potion',
        ]);
        ItemFactory::createOne([
            'name' => 'Blue Key',
        ]);
        ItemFactory::createOne([
            'name' => 'Herbs',
        ]);

        SkillFactory::createOne([
            'name' => 'Punch',
        ]);
        SkillFactory::createOne([
            'name' => 'Kick',
        ]);
        SkillFactory::createOne([
            'name' => 'Fire Punch',
        ]);
        SkillFactory::createOne([
            'name' => 'Ice Punch',
        ]);
        SkillFactory::createOne([
            'name' => 'Thunder Punch',
        ]);

        SpellFactory::createOne([
            'name' => 'Fire ball',
        ]);
        SpellFactory::createOne([
            'name' => 'Water ball',
        ]);
        SpellFactory::createOne([
            'name' => 'Thunder ball',
        ]);
        SpellFactory::createOne([
            'name' => 'Ice ball',
        ]);
        SpellFactory::createOne([
            'name' => 'Seed ball',
        ]);

        $steelSword = ArmamentTemplateFactory::createOne([
            'name' => 'Steel Sword',
            'spells' => SpellFactory::randomRange(0, 1),
            'skills' => SkillFactory::randomRange(0, 1),
        ]);

        $steelHelmet = ArmamentTemplateFactory::createOne([
            'name' => 'Steel Helmet',
            'spells' => SpellFactory::randomRange(0, 1),
            'skills' => SkillFactory::randomRange(0, 1),
        ]);

        $steelArmor = ArmamentTemplateFactory::createOne([
            'name' => 'Steel Armor',
            'spells' => SpellFactory::randomRange(0, 1),
            'skills' => SkillFactory::randomRange(0, 1),
        ]);

        CharacterTemplateFactory::createOne([
            'name' => 'Template of a Warrior',
            'kind' => $human,
            'characterClass' => $warrior,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        CharacterTemplateFactory::createOne([
            'name' => 'Template of a Priest',
            'kind' => $human,
            'characterClass' => $priest,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        CharacterTemplateFactory::createOne([
            'name' => 'Template of a Hunter',
            'kind' => $elf,
            'characterClass' => $hunter,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        NonPlayableCharacterTemplateFactory::createOne([
            'name' => 'Template of a Warrior',
            'kind' => $human,
            'characterClass' => $warrior,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        NonPlayableCharacterTemplateFactory::createOne([
            'name' => 'Template of a Priest',
            'kind' => $human,
            'characterClass' => $priest,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        NonPlayableCharacterTemplateFactory::createOne([
            'name' => 'Template of a Hunter',
            'kind' => $elf,
            'characterClass' => $hunter,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        MonsterTemplateFactory::createOne([
            'name' => 'Goblin template',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        MonsterTemplateFactory::createOne([
            'name' => 'Wolf template',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        MonsterTemplateFactory::createOne([
            'name' => 'Griffin template',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        MonsterTemplateFactory::createOne([
            'name' => 'Slime template',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        MonsterTemplateFactory::createOne([
            'name' => 'Rat template',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        $characterRed = CharacterFactory::createOne([
            'user' => $secondAccount,
            'game' => $mainGame,
            'name' => 'Red',
            'kind' => $human,
            'characterClass' => $warrior,
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);
        $characterBlue = CharacterFactory::createOne([
            'user' => $thirdAccount,
            'game' => $mainGame,
            'name' => 'Blue',
            'kind' => $elf,
            'characterClass' => $priest,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);
        $characterGreen = CharacterFactory::createOne([
            'user' => $fourthAccount,
            'game' => $mainGame,
            'name' => 'Green',
            'kind' => $human,
            'characterClass' => $hunter,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        NonPlayableCharacterFactory::createOne([
            'game' => $mainGame,
            'name' => 'Maurice',
            'kind' => $human,
            'characterClass' => $hunter,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);
        NonPlayableCharacterFactory::createOne([
            'game' => $mainGame,
            'name' => 'Michel',
            'kind' => $human,
            'characterClass' => $hunter,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);
        NonPlayableCharacterFactory::createOne([
            'game' => $mainGame,
            'name' => 'Jacques',
            'kind' => $human,
            'characterClass' => $hunter,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

        MonsterFactory::createOne([
            'game' => $mainGame,
            'name' => 'Goblin 1',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);
        MonsterFactory::createOne([
            'game' => $mainGame,
            'name' => 'Goblin 2',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);
        MonsterFactory::createOne([
            'game' => $mainGame,
            'name' => 'Goblin 3',
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
            'items' => ItemFactory::randomRange(0, 3),
        ]);

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
            'isOwned' => true,
            'monster' => MonsterFactory::random(),
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);
        ArmamentFactory::createOne([
            'name' => 'Armament NPC',
            'game' => $mainGame,
            'isOwned' => true,
            'nonPlayableCharacter' => NonPlayableCharacterFactory::random(),
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);
        ArmamentFactory::createOne([
            'name' => 'Armament Red 1',
            'game' => $mainGame,
            'isOwned' => true,
            'character' => $characterRed,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);
        ArmamentFactory::createOne([
            'name' => 'Armament Red 2',
            'game' => $mainGame,
            'isOwned' => true,
            'character' => $characterRed,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);
        ArmamentFactory::createOne([
            'name' => 'Armament Green',
            'game' => $mainGame,
            'isOwned' => true,
            'character' => $characterGreen,
            'spells' => SpellFactory::randomRange(0, 3),
            'skills' => SkillFactory::randomRange(0, 3),
        ]);

        $manager->flush();
    }
}
