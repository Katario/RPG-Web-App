<?php

namespace App\Repository;

use App\Entity\Armament;
use App\Entity\ArmamentTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArmamentTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArmamentTemplate::class);
    }

    /** @Return ArmamentTemplate[] */
    public function getLastFiveArmamentTemplates(): ?array
    {
        return $this->findBy([], ['updatedAt' => 'DESC'], 5);
    }


    public function delete(ArmamentTemplate $armamentTemplate): void
    {
        $this->getEntityManager()->remove($armamentTemplate);
        $this->getEntityManager()->flush();
    }

    public function save(ArmamentTemplate $armamentTemplate): void
    {
        $this->getEntityManager()->persist($armamentTemplate);
        $this->getEntityManager()->flush();
    }
}
