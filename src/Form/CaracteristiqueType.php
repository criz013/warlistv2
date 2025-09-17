<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CaracteristiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('movement', TextType::class, ['label' => 'Mouvement'])
            ->add('toughness', TextType::class, ['label' => 'Résistance'])
            ->add('save', TextType::class, ['label' => 'Sauvegarde'])
            ->add('wounds', TextType::class, ['label' => 'PV'])
            ->add('leadership', TextType::class, ['label' => 'Commandement'])
            ->add('objective_control', TextType::class, ['label' => 'Contrôle d’Objectif'])
            ->add('invulnerable_save', TextType::class, ['label' => 'Invu']);
    }
}
