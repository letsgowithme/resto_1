<?php

namespace App\Form;

use App\Entity\DaySlot;
use App\Entity\Schedule;
use App\Repository\DaySlotRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('day', ChoiceType::class, [
            'choices' => [
                'Lundi' => 'Lundi',
                'Mardi' => 'Mardi',
                'Mercredi' => 'Mercredi',
                'Jeudi' => 'Jeudi',
                'Vendredi' => 'Vendredi',
                'Samedi' => 'Samedi',
                'Dimanche' =>  'Dimanche',
               
            ],
            'attr' => [
                'class' => 'form-select mb-4 fs-4'
            ],
            'label' => 'Jour',
            'label_attr' => [
                'class' => 'form-label mt-4 d-none'
            ]

        ])
          
            ->add('openingTimeMidday', TextType::class, [
                'attr' => [
                    'class' => 'form-control openingTimeMidday',
                    'value' => '12:00',
                ],
                'label' => 'S\'ouvre à midi',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('closingTimeMidday', TextType::class, [
                'attr' => [
                    'class' => 'form-control  closingTimeMidday',
                    'value' => '14:00'
                ],
                'label' => 'Se ferme',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('openingTimeEvening', TextType::class, [
                'attr' => [
                    'class' => 'form-control openingTimeEvening',
                    'value' => '19:00'
                ],
                'label' => 'S\'ouvre le soir',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            ->add('closingTimeEvening', TextType::class, [
                'attr' => [
                    'class' => 'form-control  closingTimeEvening',
                    'value' => '23:00'
                ],
                'label' => 'Se ferme',
                'label_attr' => [
                    'class' => 'form-label mt-4 fs-5',
                   
                ]
            ])
            // ->add('daySlots', EntityType::class, [
            //     'class' => DaySlot::class,
            //     'query_builder' => function (DaySlotRepository $r) {
            //         return $r->createQueryBuilder('i')
            //             ->orderBy('i.name', 'ASC');
            //     },
            //     'label' => 'Heure d\'arriver',
            //     'label_attr' => [
            //         'class' => 'form-label mt-4 text-dark fs-5'
            //     ],
            //     'choice_label' => 'name',
            //     'multiple' => false,
            //     'expanded' => true

            // ])
             ->add('dayTime', ChoiceType::class, [
            'attr' => [
                'class' => 'form-control ms-4 mb-4'
            ],
            'multiple' => false,
            'expanded' => true,
            'choices'  => [
                '12:00' =>  '12:00',
                    '12:15' => '12:15',
                    '12:30' => '12:30',
                    '12:45' => '12:45',
                    '13:00' => '13:00',   
            ]
        ])

        ->add('eveningTime', ChoiceType::class, [
            'attr' => [
                'class' => 'form-control ms-4 mb-4'
            ],
            'multiple' => false,
            'expanded' => true,
            'choices'  => [
                '19:00' =>  '19:00',
                    '19:15' => '19:15',
                    '19:30' => '19:30',
                    '19:45' => '19:45',
                    '20:00' => '20:00',   
            ]
        ])

            // ->add('dayTime', ChoiceType::class, [
            //     'choices' => [
            //         '12:00' =>  '12:00',
            //         '12:15' => '12:15',
            //         '12:30' => '12:30',
            //         '12:45' => '12:45',
            //         '13:00' => '13:00',
            //         '13:15' => '13:15',
            //         '13:30' => '13:30',
            //         '13:45' => '13:45',
            //         '14:00' => '14:00',              
            //     ],
            //     'attr' => [
            //         'class' => 'form-select mb-4 fs-4'
            //     ],
            //     'label' => 'MIDI',
            //     'label_attr' => [
            //         'class' => 'form-label mt-4 d-none'
            //     ],
            //     'multiple' => false,
            // 'expanded' => true
    
            // ])

            // ->add('eveningTime', ChoiceType::class, [
            //     'choices' => [
            //         '12:00' =>  '12:00',
            //         '12:15' => '12:15',
            //         '12:30' => '12:30',
            //         '12:45' => '12:45',
            //         '13:00' => '13:00',
            //         '13:15' => '13:15',
            //         '13:30' => '13:30',
            //         '13:45' => '13:45',
            //         '14:00' => '14:00',              
            //     ],
            //     'attr' => [
            //         'class' => 'form-select mb-4 fs-4'
            //     ],
            //     'label' => 'SOIR',
            //     'label_attr' => [
            //         'class' => 'form-label mt-4 d-none'
            //     ],
            //     'multiple' => false,
            // 'expanded' => true
    
            // ])
            
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
            'data_class' => Schedule::class,
        ]);
    }
}
