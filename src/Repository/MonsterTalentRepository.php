<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Monster;
use App\Entity\MonsterTalent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MonsterTalent>
 */
class MonsterTalentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Monster::class);
    }

    public function delete(MonsterTalent $monster): void
    {
        $this->getEntityManager()->remove($monster);
        $this->getEntityManager()->flush();
    }

    public function save(MonsterTalent $monster): void
    {
        $this->getEntityManager()->persist($monster);
        $this->getEntityManager()->flush();
    }

}