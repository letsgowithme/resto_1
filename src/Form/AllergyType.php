<?php

namespace App\Form;

use App\Entity\Allergy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AllergyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'attr' => [
                'class' => 'form-control mb-4 w-50 ms-4'
            ],
            'label' => 'Vous avez une allergie?',
            'label_attr' => [
                'class' => 'form-label mt-4 fs-4 ms-4', 
            ]
          
        ])
            // ->add('reservations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Allergy::class,
        ]);
    }
}
