<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Character;
use App\Entity\CharacterTalent;
use App\Entity\NonPlayableCharacterTalent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NonPlayableCharacterTalent>
 */
class NonPlayableCharacterTalentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Character::class);
    }

    public function delete(CharacterTalent $character): void
    {
        $this->getEntityManager()->remove($character);
        $this->getEntityManager()->flush();
    }

    public function save(CharacterTalent $character): void
    {
        $this->getEntityManager()->persist($character);
        $this->getEntityManager()->flush();
    }

}