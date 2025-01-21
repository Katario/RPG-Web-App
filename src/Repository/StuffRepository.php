<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Stuff;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class StuffRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stuff::class);
    }

    public function delete(Stuff $stuff): void
    {
        $this->getEntityManager()->remove($stuff);
        $this->getEntityManager()->flush();
    }

    public function save(Stuff $stuff): void
    {
//        $stuff->setUpdatedAt(new \DateTimeImmutable());

        $this->getEntityManager()->persist($stuff);
        $this->getEntityManager()->flush();
    }
}