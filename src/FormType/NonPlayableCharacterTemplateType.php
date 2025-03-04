<?php

declare(strict_types=1);

namespace App\FormType;

use App\Entity\CharacterClass;
use App\Entity\Item;
use App\Entity\Kind;
use App\Entity\NonPlayableCharacterTemplate;
use App\Entity\Skill;
use App\Entity\Spell;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NonPlayableCharacterTemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('characterClass', EntityType::class, [
                'choice_label' => 'name',
                'class' => CharacterClass::class,
            ])
            ->add('kind', EntityType::class, [
                'choice_label' => 'name',
                'class' => Kind::class,
            ])
            ->add('minStrength', IntegerType::class)
            ->add('maxStrength', IntegerType::class)
            ->add('minIntelligence', IntegerType::class)
            ->add('maxIntelligence', IntegerType::class)
            ->add('minStamina', IntegerType::class)
            ->add('maxStamina', IntegerType::class)
            ->add('minAgility', IntegerType::class)
            ->add('maxAgility', IntegerType::class)
            ->add('minCharisma', IntegerType::class)
            ->add('maxCharisma', IntegerType::class)
            ->add('minHealthPoints', IntegerType::class)
            ->add('maxHealthPoints', IntegerType::class)
            ->add('minManaPoints', IntegerType::class)
            ->add('maxManaPoints', IntegerType::class)
            ->add('minActionPoints', IntegerType::class)
            ->add('maxActionPoints', IntegerType::class)
            ->add('minExhaustPoints', IntegerType::class)
            ->add('maxExhaustPoints', IntegerType::class)
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
            ->add('isReady', CheckboxType::class, [
                'required' => false,
            ])
            ->add('isPrivate', CheckboxType::class, [
                'required' => false,
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NonPlayableCharacterTemplate::class,
        ]);
    }
}
