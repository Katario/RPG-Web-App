<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Game;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;

class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

    public function getGamesByUser(User $user): array
    {
        return $this->createQueryBuilder('g')
            ->where('g.gameMaster = :gameMaster')
            ->setParameter('gameMaster', $user)
            ->getQuery()
            ->getResult();
    }

    public function getGamesWithPlayableCharacterByUser(User $user): array
    {
        $toto = $this->createQueryBuilder('g')
            ->innerJoin('g.playableCharacters', 'pc')
            ->innerJoin('pc.user', 'u')
            ->where('u.id = :userId')
            ->setParameter('userId', $user->getId())
            ->getQuery()
            ->getResult();

        return $toto;
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