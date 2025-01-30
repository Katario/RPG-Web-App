<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\CharacterTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CharacterTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterTemplate::class);
    }

    /** @Return CharacterTemplate[] */
    public function getLastFiveCharacterTemplates(): ?array
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