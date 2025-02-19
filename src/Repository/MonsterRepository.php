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
