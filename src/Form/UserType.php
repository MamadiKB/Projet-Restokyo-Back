<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
            ])
            ->add('username', TextType::class)
            ->add('lastname', TextType::class)
            ->add('firstname', TextType::class)
            ->add('birthdate', DateType::class, [
                //'years' => range(date('Y'), date('Y') - 100),
                // De la date courante jusqu'à la date du premier film
                'years' => range(date('Y') + 5, 1895),

            ])
            ->add('nationality', TextType::class)
            ->add('picture')
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôles',
                'choices' => [
                    'Membre' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                ],
                // Choix multiple
                'multiple' => false,
                // Des boutons radios
                'expanded' => true,
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
                // User
                $user = $event->getData();
                // Form
                $form = $event->getForm();

                // Add or Edit ?
                // A new user doesn't have an ID
                if ($user->getId() === null) {
                    // Add (new)
                    $form->add('password', PasswordType::class, [
                        'constraints' => [
                            new NotBlank(),
                            new Regex("/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*['_', '-', '|', '%', '&', '*', '=', '@', '$']).{8,}$/")
                        ],
                        'help' => 'Au moins 8 caractères,
                            au moins une minuscule
                            au moins une majuscule
                            au moins un chiffre
                            au moins un caractère spécial parmi _, -, |, %, &, *, =, @, $'
                    ]);
                } else {
                    // Edit
                    $form->add('password', PasswordType::class, [
                        // For the edit
                        'empty_data' => '',
                        'attr' => [
                            'placeholder' => 'Laissez vide si inchangé'
                        ],
                        // This field will not automaticaly mapped on the entity
                        // The $user's propety $password will not modify by the form's processing
                        'mapped' => false,
                    ]);
                }
            });
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
