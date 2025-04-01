<?php

namespace App\Repository;

use App\Entity\Armament;
use App\Enum\PossibleOwnerEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Armament>
 */
class ArmamentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Armament::class);
    }

    /** @return Armament[] */
    public function findByGameBySearch(int $gameId, ?string $query, ?int $limit = null, string $orderBy = 'ASC'): array
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->where('a.name LIKE :query')
            ->orWhere('a.category LIKE :query')
            ->andWhere('a.game = :gameId')
            ->setParameter('query', '%'.$query.'%')
            ->setParameter('gameId', $gameId)
            ->orderBy('a.name', $orderBy)
        ;

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

    public function availableArmamentsQueryBuilder(int $gameId, PossibleOwnerEnum $owner, ?int $ownerId = null): QueryBuilder
    {
        $qb = $this->createQueryBuilder('a');

        $qb
            ->where($qb->expr()->andX(
                $qb->expr()->eq('a.game', ':gameId'),
                $qb->expr()->orX(
                    $qb->expr()->eq('a.isOwned', 'false'),
                    $qb->expr()->andX(
                        $qb->expr()->eq('a.isOwned', 'true'),
                        $ownerId
                            ? $qb->expr()->eq('a.'.$owner, ':ownerId')
                            : '1 = 1',
                    )
                )
            ))
            ->setParameter('gameId', $gameId);

        if ($ownerId) {
            $qb->setParameter('ownerId', $ownerId);
        }

        return $qb;
    }

    public function deleteFromGame(int $gameId): void
    {
        $this->createQueryBuilder('a')
            ->delete()
            ->where('a.game = :gameId')
            ->setParameter('gameId', $gameId)
            ->getQuery()
            ->getResult()
        ;
    }

    public function delete(Armament $armament): void
    {
        $this->getEntityManager()->remove($armament);
        $this->getEntityManager()->flush();
    }

    public function save(Armament $armament): void
    {
        $this->getEntityManager()->persist($armament);
        $this->getEntityManager()->flush();
    }
}
