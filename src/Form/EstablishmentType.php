<?php

namespace App\Form;

use App\Entity\Establishment;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;

class EstablishmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Restaurant' => 'Restaurant',
                    'Isakaya' => 'Isakaya',
                ],
                'expanded' => true,
            ])
            ->add('description', TextareaType::class)
            ->add('address')
            // ->add('opening_days',ChoiceType::class, [
                
            //     'choices' => [
            //         'Lundi' => 'lundi',
            //         'Mardi' => 'mardi',
            //         'Mercredi' => 'mercredi',
            //         'Jeudi' => 'jeudi',
            //         'Vendredi' => 'vendredi',
            //         'Samedi' => 'samedi',
            //         'Dimanche' => 'dimanche',
            //     ],

            //     'expanded' => true,
            //     'multiple' => true,
            // ])
            // ->add('noon_opening_time', TimezoneType::class, [
            //     'placeholder' => [
            //         'hour' => 'Hour',
            //         'minute' => 'Minute',
            //         'second' => 'Second',
            //     ],

            //     'boolean' => false,
            // ])
            // ->add('evening_opening_time')
            // ->add('website', UrlType::class)
            // ->add('phone', IntegerType::class)
            ->add('picture', UrlType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Establishment::class,
        ]);
    }
}
