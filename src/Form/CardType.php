<?php

namespace App\Form;

use App\Entity\Card;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CardType extends AbstractType
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

        ->add('submit', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-primary mt-4 mb-4 fs-5'
            ],
        'label' => 'Sauvegarder l\'image'
    ]);
    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Card::class,
        ]);
    }
}
