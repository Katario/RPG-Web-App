<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Game;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Game>
 */
class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

    /** @return Game[] */
    public function getGamesByUser(User $user): array
    {
        return $this->createQueryBuilder('g')
            ->where('g.gameMaster = :gameMaster')
            ->setParameter('gameMaster', $user)
            ->getQuery()
            ->getResult();
    }

    /** @return Game[] */
    public function getGamesWithCharacterByUser(User $user): array
    {
        return $this->createQueryBuilder('g')
            ->innerJoin('g.characters', 'pc')
            ->innerJoin('pc.user', 'u')
            ->where('u.id = :userId')
            ->setParameter('userId', $user->getId())
            ->getQuery()
            ->getResult();
    }

    public function delete(Game $game): void
    {
        $this->getEntityManager()->remove($game);
        $this->getEntityManager()->flush();
    }

    public function save(Game $game): void
    {
        //        $game->setUpdatedAt(new \DateTimeImmutable());

        $this->getEntityManager()->persist($game);
        $this->getEntityManager()->flush();
    }
}
