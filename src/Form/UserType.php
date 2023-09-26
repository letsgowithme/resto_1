<?php

namespace App\Form;

use App\Entity\Allergy;
use App\Entity\User;
use App\Repository\AllergyRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('fullName', TextType::class, [
            'attr' => [
                'class' => 'form-control',
                'minlenght' => '2',
                'maxlenght' => '50',
            ],
            'label' => 'Nom / Prénom',
            'label_attr' => [
                'class' => 'form-label  mt-4'
            ],
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 2, 'max' => 50])
            ]
        ])
        ->add('email', EmailType::class, [
            'attr' => [
                'class' => 'form-control',
                'minLength' => '2',
                'maxLength' => '180'
            ],
            'label' => 'Email',
            'label_attr' => [
                'class' => 'form-label mt-4',
                
            ],
            'constraints' => [
                new Assert\Length(['min' => 2, 'max' => 180]),
                new Assert\Email(),
                new Assert\NotBlank()
            ]
        ])
        // ->add('roles', ChoiceType::class, [
        //     'attr' => [
        //         'class' => 'form-control ms-4 mb-4'
        //     ],
        //     'multiple' => true,
        //     'choices'  => [
        //         'User' => 'ROLE_USER',
        //         'Admin' => 'ROLE_ADMIN'
        //     ]
        // ])
        ->add('plainPassword', PasswordType::class, [
            'attr' => [
                'class' => 'form-control'
            ],
            'label' => 'Mot de passe',
            'label_attr' => [
                'class' => 'form-label  mt-4'
            ]
        ])
           
            ->add('nbPeople', IntegerType::class, [
                'attr' => [
                'class' => 'form-control',
                'min' => 1,
                'max' => 20
                ],
                'label' => 'Nombre de convives',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Positive(),
                    new Assert\LessThan(10)
                ]
            ])
            ->add('allergies', EntityType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Allergie',
                'required' => false,
                'class' => Allergy::class,
                'query_builder' => function (AllergyRepository $r) {
                    return $r->createQueryBuilder('i')
                        ->orderBy('i.name', 'ASC');
                },
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true
            ])
         
          
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
            'data_class' => User::class,
        ]);
    }
}
