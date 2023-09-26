<?php

namespace App\Form;

use App\Repository\ReservationRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DinnerHoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
       ->add('hour', ChoiceType::class, [
                'choices' => [
                    '19:00' => '19:00',
                    '19:15' => '12:15',
                    '19:30' => '12:30',
                    '19:45' => '12:45',
                    '20:00' => '13:00',
                    '20:15' => '20:15',
                    '20:30' => '20:30',
                    '20:45' => '20:45',
                    '21:00' => '21:00',  
                    '21:15' => '21:15',
                    '21:30' => '21:30',
                    '21:45' => '21:45',
                    '22:00' => '22:00', 
                    


                ],
                'attr' => [
                    'class' => 'form-select mb-4 fs-4'
                ],
                'label' => 'SOIR',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-none'
                ],
                'multiple' => false,
            'expanded' => true,
            'required' => false
    
            ])
      
           
            
            ->add('reservations', EntityType::class, [
                'class' => Reservation::class,
                'query_builder' => function (ReservationRepository $r) {
                    return $r->createQueryBuilder('i')
                        ->orderBy('i.name', 'ASC');
                },
                'label' => 'Reservation',
                'label_attr' => [
                    'class' => 'form-label mt-4 text-dark fs-5'
                ],
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LunchHours::class,
        ]);
    }
}

