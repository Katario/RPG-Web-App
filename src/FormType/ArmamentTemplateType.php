<?php

declare(strict_types=1);

namespace App\FormType;

use App\Entity\EquipmentTemplate;
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

class ArmamentTemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('category', TextType::class)
            ->add('value', IntegerType::class)
            ->add('minDurability', IntegerType::class)
            ->add('maxDurability', IntegerType::class)
            ->add('description', TextType::class)
            ->add('note', NoteType::class)
            ->add('weight', IntegerType::class)
            ->add('skills', EntityType::class, [
                'choice_label' => 'name',
                'class' => Skill::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('spells', EntityType::class, [
                'choice_label' => 'name',
                'class' => Spell::class,
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
            'data_class' => EquipmentTemplate::class,
        ]);
    }
}
