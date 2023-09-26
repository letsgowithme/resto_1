<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'attr' => [
                'class' => 'form-control mb-4 w-50'
            ],
            'label' => 'Titre',
            'label_attr' => [
                'class' => 'form-label mt-4 fs-4', 
            ]
          
        ])
            ->add('imageFile', VichImageType::class, [
                'label' => '',
                'label_attr' => [
                    'class' => 'd-none form-label mt-4 mt-4 mb-4'
                ],
                'required' => false
            ])
        ;
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
