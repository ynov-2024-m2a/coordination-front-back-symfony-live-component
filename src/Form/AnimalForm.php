<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AnimalForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('animals', AnimalAutocompleteField::class)
            ->add('name', TextType::class, options: [
                'label' => 'Quel est votre nom ?',
            ])
        ;
    }
}
