<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\NonPlayableCharacterTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class NonPlayableCharacterTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NonPlayableCharacterTemplate::class);
    }

    /** @Return NonPlayableCharacterTemplate[] */
    public function getLastFiveNonPlayableCharacterTemplates(): ?array
    {
        return $this->findBy([], ['updatedAt' => 'DESC'], 5);
    }


    public function delete(NonPlayableCharacterTemplate $nonPlayableCharacter): void
    {
        $this->getEntityManager()->remove($nonPlayableCharacter);
        $this->getEntityManager()->flush();
    }

    public function save(NonPlayableCharacterTemplate $nonPlayableCharacter): void
    {
        $this->getEntityManager()->persist($nonPlayableCharacter);
        $this->getEntityManager()->flush();
    }
}