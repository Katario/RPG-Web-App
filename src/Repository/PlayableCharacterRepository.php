<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\PlayableCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PlayableCharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayableCharacter::class);
    }

    public function delete(PlayableCharacter $playableCharacter): void
    {
        $this->getEntityManager()->remove($playableCharacter);
        $this->getEntityManager()->flush();
    }

    public function save(PlayableCharacter $playableCharacter): void
    {
//        $playableCharacter->setUpdatedAt(new \DateTimeImmutable());

        $this->getEntityManager()->persist($playableCharacter);
        $this->getEntityManager()->flush();
    }
}