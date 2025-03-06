<?php

declare(strict_types=1);

namespace App\FormType;

use App\Entity\Armament;
use App\Entity\Item;
use App\Entity\Monster;
use App\Entity\Skill;
use App\Entity\Spell;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonsterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('level', IntegerType::class)
            ->add('currentHealthPoints', IntegerType::class)
            ->add('maxHealthPoints', IntegerType::class)
            ->add('currentManaPoints', IntegerType::class)
            ->add('maxManaPoints', IntegerType::class)
            ->add('currentActionPoints', IntegerType::class)
            ->add('maxActionPoints', IntegerType::class)
            ->add('currentExhaustPoints', IntegerType::class)
            ->add('maxExhaustPoints', IntegerType::class)
            ->add('isBoss', CheckboxType::class, [
                'required' => false,
            ])
            ->add('armaments', EntityType::class, [
                'choice_label' => 'name',
                'class' => Armament::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('spells', EntityType::class, [
                'choice_label' => 'name',
                'class' => Spell::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('skills', EntityType::class, [
                'choice_label' => 'name',
                'class' => Skill::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('items', EntityType::class, [
                'choice_label' => 'name',
                'class' => Item::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('game', EntityHiddenType::class)
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Monster::class,
        ]);
    }
}
