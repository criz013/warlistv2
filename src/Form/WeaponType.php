<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class WeaponType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('range', TextType::class, ['label' => 'Portée'])
            ->add('attacks', TextType::class, ['label' => 'Attaques'])
            ->add('ballistic_skill', TextType::class, ['label' => 'CT'])
            ->add('strength', TextType::class, ['label' => 'Force'])
            ->add('armor_penetration', TextType::class, ['label' => 'PA'])
            ->add('damage', TextType::class, ['label' => 'Dégâts'])
            ->add('keywords', CollectionType::class, [
                'entry_type' => TextType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'Mots-clés',
            ]);
    }
}
