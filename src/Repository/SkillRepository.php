<?php

namespace App\Repository;

use App\Entity\Skill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SkillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skill::class);
    }

    /** @Return Skill[] */
    public function getLastFiveSkills(): ?array
    {
        return $this->findBy([], ['name' => 'DESC'], 5);
    }

    public function delete(Skill $skill): void
    {
        $this->getEntityManager()->remove($skill);
        $this->getEntityManager()->flush();
    }

    public function save(Skill $skill): void
    {
        $this->getEntityManager()->persist($skill);
        $this->getEntityManager()->flush();
    }
}
