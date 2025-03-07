<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\CharacterClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CharacterClass>
 */
class CharacterClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterClass::class);
    }

    public function delete(CharacterClass $characterClass): void
    {
        $this->getEntityManager()->remove($characterClass);
        $this->getEntityManager()->flush();
    }

    public function save(CharacterClass $characterClass): void
    {
        $this->getEntityManager()->persist($characterClass);
        $this->getEntityManager()->flush();
    }
}
