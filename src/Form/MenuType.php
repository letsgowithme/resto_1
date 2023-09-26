<?php

namespace App\Form;

use App\Entity\Menu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class, [
            'attr' => [
                'class' => 'form-control',
                'minlenght' => '2',
                'maxlenght' => '50',
            ],
            'label' => 'Titre',
            'label_attr' => [
                'class' => 'form-label  mt-4'
            ],
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 2, 'max' => 50])
            ]
        ])
        ->add('conditions', TextareaType::class, [
            'attr' => [
                'class' => 'form-control'
            ],
            'label' => 'Description',
            'label_attr' => [
                'class' => 'form-label mt-4 text-dark fs-5'
            ],
            'constraints' => [
                new Assert\NotBlank()
            ]
        ])
        ->add('description', TextareaType::class, [
            'attr' => [
                'class' => 'form-control'
            ],
            'label' => 'Description',
            'label_attr' => [
                'class' => 'form-label mt-4 text-dark fs-5'
            ],
            'constraints' => [
                new Assert\NotBlank()
            ]
        ])
        ->add('price', IntegerType::class, [
            'attr' => [
            'class' => 'form-control',
            'min' => 10,
            'max' => 35
            ],
            'label' => 'Prix',
            'label_attr' => [
                'class' => 'form-label mt-4 text-dark fs-5'
            ],
            'constraints' => [
                new Assert\Positive(),
                new Assert\LessThan(35)
            ]
        ])
            ->add('description')
            ->add('price')
       
        ->add('submit', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-primary mt-4 fs-4'
            ],
            'label' => 'Sauvegarder',
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
