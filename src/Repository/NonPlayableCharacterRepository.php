<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\NonPlayableCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class NonPlayableCharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NonPlayableCharacter::class);
    }

    public function delete(NonPlayableCharacter $nonPlayableCharacter): void
    {
        $this->getEntityManager()->remove($nonPlayableCharacter);
        $this->getEntityManager()->flush();
    }

    public function save(NonPlayableCharacter $nonPlayableCharacter): void
    {
        $this->getEntityManager()->persist($nonPlayableCharacter);
        $this->getEntityManager()->flush();
    }
}
