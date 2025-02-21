<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Character;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Character::class);
    }

    public function findBySearch(?string $query, int $limit = null, $orderBy = 'ASC'): array
    {
        $queryBuilder =  $this->createQueryBuilder('c');
        $queryBuilder->where('c.name LIKE :query')
            ->orWhere('c.lastName LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->orderBy('c.name', $orderBy)
        ;

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

    public function delete(Character $character): void
    {
        $this->getEntityManager()->remove($character);
        $this->getEntityManager()->flush();
    }

    public function save(Character $character): void
    {
//        $character->setUpdatedAt(new \DateTimeImmutable());

        $this->getEntityManager()->persist($character);
        $this->getEntityManager()->flush();
    }
}