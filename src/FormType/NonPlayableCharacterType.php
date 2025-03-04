<?php

declare(strict_types=1);

namespace App\FormType;

use App\Entity\Armament;
use App\Entity\CharacterClass;
use App\Entity\Item;
use App\Entity\Kind;
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

class NonPlayableCharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('lastName', TextType::class)
            ->add('characterClass', EntityType::class, [
                'choice_label' => 'name',
                'class' => CharacterClass::class,
            ])
            ->add('kind', EntityType::class, [
                'choice_label' => 'name',
                'class' => Kind::class,
            ])
            ->add('level', IntegerType::class)
            ->add('strength', IntegerType::class)
            ->add('intelligence', IntegerType::class)
            ->add('stamina', IntegerType::class)
            ->add('agility', IntegerType::class)
            ->add('charisma', IntegerType::class)
            ->add('currentHealthPoints', IntegerType::class)
            ->add('maxHealthPoints', IntegerType::class)
            ->add('currentManaPoints', IntegerType::class)
            ->add('maxManaPoints', IntegerType::class)
            ->add('currentActionPoints', IntegerType::class)
            ->add('maxActionPoints', IntegerType::class)
            ->add('currentExhaustPoints', IntegerType::class)
            ->add('maxExhaustPoints', IntegerType::class)
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
            'data_class' => NonPlayableCharacter::class,
        ]);
    }
}
