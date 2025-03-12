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

    public function getAvailableForNewCharacterUser(int $gameId, int $userId): QueryBuilder
    {
        $queryBuilder = $this->createQueryBuilder('u');

        return $queryBuilder
            ->where(
                $queryBuilder->expr()->not(
                    $queryBuilder->expr()->exists(
                        $this->createQueryBuilder('uc')
                            ->from(Character::class, 'c')
                            ->where('c.game = :gameId')
                            ->andWhere('c.user = u.id')
                            ->getDQL()
                    )
                )
            )
            ->andWhere('u.id != :userId')
            ->setParameter('gameId', $gameId)
            ->setParameter('userId', $userId);
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
