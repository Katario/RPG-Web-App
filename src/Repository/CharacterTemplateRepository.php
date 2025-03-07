<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\CharacterTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CharacterTemplate>
 */
class CharacterTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterTemplate::class);
    }

    /** @return CharacterTemplate[] */
    public function findBySearch(?string $query, ?int $limit = null, string $orderBy = 'ASC'): array
    {
        $queryBuilder = $this->createQueryBuilder('ct');
        $queryBuilder->where('ct.name LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->orderBy('ct.name', $orderBy)
        ;

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

    /** @return CharacterTemplate[] */
    public function getLastFiveCharacterTemplates(): array
    {
        return $this->findBy([], ['updatedAt' => 'DESC'], 5);
    }

    public function delete(CharacterTemplate $character): void
    {
        $this->getEntityManager()->remove($character);
        $this->getEntityManager()->flush();
    }

    public function save(CharacterTemplate $character): void
    {
        $this->getEntityManager()->persist($character);
        $this->getEntityManager()->flush();
    }
}
