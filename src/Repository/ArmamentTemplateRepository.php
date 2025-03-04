<?php

namespace App\Repository;

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

    public function findBySearch(?string $query, ?int $limit = null, $orderBy = 'ASC'): array
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->where('a.name LIKE :query')
            ->orWhere('a.category LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->orderBy('a.name', $orderBy)
        ;

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder
            ->getQuery()
            ->getResult();
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
