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
