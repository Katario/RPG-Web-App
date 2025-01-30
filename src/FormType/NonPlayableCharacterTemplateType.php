<?php

declare(strict_types=1);

namespace App\FormType;

use App\Entity\Item;
use App\Entity\NonPlayableCharacterTemplate;
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

class NonPlayableCharacterTemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('title', TextType::class)
            ->add('strengthMin', IntegerType::class)
            ->add('strengthMax', IntegerType::class)
            ->add('intelligenceMin', IntegerType::class)
            ->add('intelligenceMax', IntegerType::class)
            ->add('staminaMin', IntegerType::class)
            ->add('staminaMax', IntegerType::class)
            ->add('agilityMin', IntegerType::class)
            ->add('agilityMax', IntegerType::class)
            ->add('charismaMin', IntegerType::class)
            ->add('charismaMax', IntegerType::class)
            ->add('healthPointMin', IntegerType::class)
            ->add('healthPointMax', IntegerType::class)
            ->add('manaMin', IntegerType::class)
            ->add('manaMax', IntegerType::class)
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
                'data' => true
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