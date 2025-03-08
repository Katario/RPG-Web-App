<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Specie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Specie>
 */
class SpecieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specie::class);
    }

    public function delete(Specie $kind): void
    {
        $this->getEntityManager()->remove($kind);
        $this->getEntityManager()->flush();
    }

    public function save(Specie $kind): void
    {
        $this->getEntityManager()->persist($kind);
        $this->getEntityManager()->flush();
    }
}