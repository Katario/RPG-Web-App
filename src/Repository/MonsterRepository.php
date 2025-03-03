<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Monster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MonsterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Monster::class);
    }

    public function findBySearch(?string $query, int $limit = null, $orderBy = 'ASC'): array
    {
        $queryBuilder =  $this->createQueryBuilder('m');
        $queryBuilder->where('m.name LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->orderBy('m.name', $orderBy)
        ;

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

    public function delete(Monster $monster): void
    {
        $this->getEntityManager()->remove($monster);
        $this->getEntityManager()->flush();
    }

    public function save(Monster $monster): void
    {
        $this->getEntityManager()->persist($monster);
        $this->getEntityManager()->flush();
    }
}
