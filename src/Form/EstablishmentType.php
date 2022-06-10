<?php

namespace App\Form;

use App\Entity\Establishment;
use DateInterval;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EstablishmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Restaurent' => 'Restaurent',
                    'Isakaya' => 'Isakaya',
                ],
                'expanded' => true,
            ])
            ->add('description', TextareaType::class)
            ->add('address')
            ->add('opening_days',ChoiceType::class, [
                'choices' => [
                    'Lundi' => 'lundi',
                    'Mardi' => 'mardi',
                    'Mercredi' => 'mercredi',
                    'Jeudi' => 'jeudi',
                    'Vendredi' => 'vendredi',
                    'Samedi' => 'samedi',
                    'Dimanche' => 'dimanche',
                ],

                'expanded' => true,
                'multiple' => true,
            ])
            ->add('noon_opening_time', DateInterval::class, [
                'choices' => [
                    'hours' => array_combine(range(1, 24), range(1, 24)),
                ],
            ])
            ->add('evening_opening_time')
            ->add('website', UrlType::class)
            ->add('phone', IntegerType::class)
            ->add('picture', FileType::class, [
                'multiple'    => false,
                'attr' => array(
                    'accept' => 'image/*',
                    )
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Establishment::class,
        ]);
    }
}
