<?php

namespace App\Form;

use App\Entity\LunchHours;
use App\Entity\Reservation;
use App\Repository\ReservationRepository;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LunchHoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
       ->add('hour', ChoiceType::class, [
                'choices' => [
                    '12:00' => '12:00',
                    '12:15' => '12:15',
                    '12:30' => '12:30',
                    '12:45' => '12:45',
                    '13:00' => '13:00',
                    '13:15' => '13:15',
                    '13:30' => '13:30',
                    '13:45' => '13:45',
                    '14:00' => '14:00',              
                ],
                'attr' => [
                    'class' => 'form-select mb-4 fs-4'
                ],
                'label' => 'MIDI',
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
