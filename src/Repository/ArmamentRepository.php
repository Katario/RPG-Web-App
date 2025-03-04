<?php

namespace App\Repository;

use App\Entity\Armament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArmamentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Armament::class);
    }

    public function findBySearch(?string $query, ?int $limit = null, $orderBy = 'ASC'): array
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->where('a.name LIKE :query')
            ->orWhere('a.category LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->orderBy('a.name', $orderBy)
        ;

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder
            ->getQuery()
            ->getResult();
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
