<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\MonsterTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MonsterTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MonsterTemplate::class);
    }

    /** @Return MonsterTemplate[] */
    public function getLastFiveMonsterTemplates(): ?array
    {
        return $this->findBy([], ['updatedAt' => 'DESC'], 5);
    }


    public function delete(MonsterTemplate $monsterTemplate): void
    {
        $this->getEntityManager()->remove($monsterTemplate);
        $this->getEntityManager()->flush();
    }

    public function save(MonsterTemplate $monsterTemplate): void
    {
        $this->getEntityManager()->persist($monsterTemplate);
        $this->getEntityManager()->flush();
    }
}