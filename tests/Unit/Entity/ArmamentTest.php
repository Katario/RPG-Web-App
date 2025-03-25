<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Armament;
use App\Entity\Character;
use App\Entity\Monster;
use App\Entity\NonPlayableCharacter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Armament::class)]
class ArmamentTest extends TestCase
{
    public function testReturnFullNameIfOwnerIsAMonster(): void
    {
        $armament = new Armament();

        $monster = new Monster();
        $monster->setName('Little Goblin');

        $armament->setMonster($monster);

        self::assertSame('Little Goblin', $armament->getOwnerName());
    }

    public function testReturnFullNameIfOwnerIsACharacter(): void
    {
        $armament = new Armament();

        $character = new Character();

        $character->setName('Billy');
        $character->setLastName('O\'Neil');

        $armament->setCharacter($character);

        self::assertSame('Billy O\'Neil', $armament->getOwnerName());
    }

    public function testReturnFullNameIfOwnerIsANonPlayableCharacter(): void
    {
        $armament = new Armament();

        $nonPlayableCharacter = new NonPlayableCharacter();

        $nonPlayableCharacter->setName('Jack');
        $nonPlayableCharacter->setLastName('Doe');

        $armament->setNonPlayableCharacter($nonPlayableCharacter);

        self::assertSame('Jack Doe', $armament->getOwnerName());
    }

    public function testReturnFullNameIfNoOwner(): void
    {
        $armament = new Armament();

        self::assertNull($armament->getOwnerName());
    }

    public function testOnlyOneOwnerWhenCharacterIsSet(): void
    {
        $armament = new Armament();
        $character = new Character();
        $armament->setCharacter($character);

        self::assertSame($character, $armament->getCharacter());
        self::assertNull($armament->getNonPlayableCharacter());
        self::assertNull($armament->getMonster());
        self::assertTrue($armament->isOwned());
    }

    public function testOnlyOneOwnerWhenNonPlayableCharacterIsSet(): void
    {
        $armament = new Armament();
        $nonPlayableCharacter = new NonPlayableCharacter();
        $armament->setNonPlayableCharacter($nonPlayableCharacter);

        self::assertNull($armament->getCharacter());
        self::assertSame($nonPlayableCharacter, $armament->getNonPlayableCharacter());
        self::assertNull($armament->getMonster());
        self::assertTrue($armament->isOwned());
    }

    public function testOnlyOneOwnerWhenMonsterIsSet(): void
    {
        $armament = new Armament();
        $monster = new Monster();
        $armament->setMonster($monster);

        self::assertNull($armament->getCharacter());
        self::assertNull($armament->getNonPlayableCharacter());
        self::assertSame($monster, $armament->getMonster());
        self::assertTrue($armament->isOwned());
    }
}
