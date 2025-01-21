<?php

declare(strict_types=1);

namespace App\FormType;

use App\Entity\PlayableCharacter;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DefaultPlayableCharacterType extends AbstractType
{
    public function __construct(
        public Security $security
    )
    { }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $userId = $this->security->getUser()->getId();

        $builder
            ->add('user', EntityType::class, [
                'choice_label' => 'username',
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) use ($userId): QueryBuilder {
                    return $er->createQueryBuilder('u')
                        ->where('u.id != :userId')
                        ->setParameter('userId', $userId);
                }
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlayableCharacter::class,
        ]);
    }
}