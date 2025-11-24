<?php

namespace App\Repository;

use App\Entity\EquipmentTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EquipmentTemplate>
 */
class EquipmentTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipmentTemplate::class);
    }

    /** @return EquipmentTemplate[] */
    public function getLastFiveArmamentTemplates(): array
    {
        return $this->findBy([], ['updatedAt' => 'DESC'], 5);
    }

    /** @return EquipmentTemplate[] */
    public function findBySearch(?string $query, ?int $limit = null, string $orderBy = 'ASC'): array
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

    public function delete(EquipmentTemplate $armamentTemplate): void
    {
        $this->getEntityManager()->remove($armamentTemplate);
        $this->getEntityManager()->flush();
    }

    public function save(EquipmentTemplate $armamentTemplate): void
    {
        $this->getEntityManager()->persist($armamentTemplate);
        $this->getEntityManager()->flush();
    }
}
