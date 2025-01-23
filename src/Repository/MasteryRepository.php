<?php

namespace App\Repository;

use App\Entity\Mastery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MasteryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mastery::class);
    }

    public function delete(Mastery $mastery): void
    {
        $this->getEntityManager()->remove($mastery);
        $this->getEntityManager()->flush();
    }

    public function save(Mastery $mastery): void
    {
        $this->getEntityManager()->persist($mastery);
        $this->getEntityManager()->flush();
    }
}
