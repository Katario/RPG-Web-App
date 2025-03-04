<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Kind;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class KindRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kind::class);
    }

    public function delete(Kind $kind): void
    {
        $this->getEntityManager()->remove($kind);
        $this->getEntityManager()->flush();
    }

    public function save(Kind $kind): void
    {
        $this->getEntityManager()->persist($kind);
        $this->getEntityManager()->flush();
    }
}
