<?php

declare(strict_types=1);

namespace App\Tests\Integration\Repository;

use App\Enum\PossibleOwnerEnum;
use App\Fixtures\DataFixtures\Factory\ArmamentFactory;
use App\Fixtures\DataFixtures\Factory\GameFactory;
use App\Repository\ArmamentRepository;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

#[CoversClass(ArmamentRepository::class)]
class ArmamentRepositoryTest extends KernelTestCase
{
    use ResetDatabase;
    use Factories;

    #[DataProvider('possibleOwnerEnumProvider')]
    public function testIsArmamentAvailableWithNoOwner(
        PossibleOwnerEnum $possibleOwnerEnum,
    ): void {
        self::bootKernel();

        $game = GameFactory::createOne();
        ArmamentFactory::createOne([
            'game' => $game,
        ]);

        $result = $this->getArmamentRepository()
            ->availableArmamentsQueryBuilder(
                $game->getId(),
                $possibleOwnerEnum
            )
            ->getQuery()
            ->getResult();

        self::assertCount(1, $result);
    }

    public static function possibleOwnerEnumProvider(): \Generator
    {
        yield 'Armament available for Monsters' => [PossibleOwnerEnum::MONSTER];
        yield 'Armament available for Characters' => [PossibleOwnerEnum::CHARACTER];
        yield 'Armament available for NPCs' => [PossibleOwnerEnum::NON_PLAYABLE_CHARACTER];
    }

    private function getArmamentRepository(): ArmamentRepository
    {
        return self::getContainer()->get(ArmamentRepository::class);
    }
}
