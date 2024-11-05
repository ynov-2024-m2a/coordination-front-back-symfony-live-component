<?php

namespace App\Form;

use App\Entity\Animal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\BaseEntityAutocompleteType;

#[AsEntityAutocompleteField]
class AnimalAutocompleteField extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'class' => Animal::class,
            'searchable_fields' => ['name'],
            'label' => 'Quels animaux aimeriez-vous avoir ?',
            'choice_label' => 'name',
            'multiple' => true,
            'constraints' => [
                new Count(min: 1, minMessage: 'Selectionnez au moins un animal.'),
            ],
        ]);
    }

    public function getParent(): string
    {
        return BaseEntityAutocompleteType::class;
    }
}
