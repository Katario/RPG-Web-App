<?php

namespace App\FormType;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;

class EntityHiddenType extends HiddenType implements DataTransformerInterface
{
    private string $entityClass;

    public function __construct(
        public ManagerRegistry $doctrine,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Set class, eg: App\Entity\RuleSet
        $this->entityClass = sprintf('App\Entity\%s', ucfirst($builder->getName()));
        $builder->addModelTransformer($this);
    }

    public function transform(mixed $value): string
    {
        if (!$value instanceof $this->entityClass) {
            return '';
        }

        return $value->getId();
    }

    public function reverseTransform(mixed $value): mixed
    {
        if (!$value) {
            return null;
        }

        $return = null;
        try {
            $repository = $this->doctrine->getRepository($this->entityClass);
            $return = $repository->findOneBy([
                'id' => $value,
            ]);
        } catch (\Exception $e) {
            throw new TransformationFailedException($e->getMessage());
        }

        if (null === $return) {
            throw new TransformationFailedException(sprintf('A %s with id "%s" does not exist!', $this->entityClass, $value));
        }

        return $return;
    }
}
