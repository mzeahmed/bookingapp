<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $nameConstraints = [
            new NotBlank(message: 'This value should not be blank.'),
            new Length(
                min: 2,
                max: 50,
                minMessage: '{{ limit }} characters minimum',
                maxMessage: '{{ limit }} characters maximum'
            ),
            new Regex(
                pattern: '/^[\p{L}\s\'\-]+$/u',
                message: 'Not authorized characters.',
            ),
        ];

        $builder
            ->add(
                child: 'firstName',
                type: TextType::class,
                options: $this->getConfiguration(
                    label: 'First name',
                    placeholder: 'Your first name',
                    options: [
                        'constraints' => $nameConstraints,
                        'attr' => ['autocomplete' => 'given-name'],
                    ],
                )
            )
            ->add(
                child: 'lastName',
                type: TextType::class,
                options: $this->getConfiguration(
                    label: 'Last name',
                    placeholder: 'Your last name',
                    options: [
                        'constraints' => $nameConstraints,
                        'attr' => ['autocomplete' => 'family-name'],
                    ],
                )
            )
            ->add('email')
            ->add(
                child: 'agreeTerms',
                type: CheckboxType::class,
                options: [
                    'mapped' => false,
                    'constraints' => [
                        new IsTrue(
                            message: 'You should agree to our terms.',
                        ),
                    ],
                ]
            )
            ->add(
                child: 'plainPassword',
                type: PasswordType::class,
                options: [
                    // instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'mapped' => false,
                    'attr' => ['autocomplete' => 'new-password'],
                    'constraints' => [
                        new NotBlank(
                            message: 'Please enter a password',
                        ),
                        new Length(
                            min: 6,
                            max: 4096,
                            // max length allowed by Symfony for security reasons
                            minMessage: 'Your password should be at least {{ limit }} characters',
                        ),
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
