<?php

declare(strict_types=1);

namespace App\FormType;

use App\Entity\Armament;
use App\Entity\Item;
use App\Entity\NonPlayableCharacter;
use App\Entity\Skill;
use App\Entity\Spell;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenerateNonPlayableCharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('title', TextType::class)
            ->add('strength', IntegerType::class)
            ->add('intelligence', IntegerType::class)
            ->add('stamina', IntegerType::class)
            ->add('agility', IntegerType::class)
            ->add('charisma', IntegerType::class)
            ->add('healthPoint', IntegerType::class)
            ->add('mana', IntegerType::class)
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
            ->add('armaments', EntityType::class, [
                'choice_label' => 'name',
                'class' => Armament::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NonPlayableCharacter::class,
        ]);
    }
}