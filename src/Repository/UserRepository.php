<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Character;
use App\Entity\Game;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getAvailableForNewCharacterUser(int $gameId): QueryBuilder
    {
        return $this->createQueryBuilder('u')
            ->innerJoin(Game::class, 'g', Join::WITH, 'g.gameMaster != u.id')
            ->leftJoin(Character::class, 'c', Join::WITH, 'c.user = u.id')
            ->where('g.id = :gameId')
            ->andWhere('c.id is null')
            ->groupBy('u.id, c.id')
            ->setParameter('gameId', $gameId);
    }

    public function delete(User $user): void
    {
        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();
    }

    public function save(User $user): void
    {
        //        $user->setUpdatedAt(new \DateTimeImmutable());

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }
}
