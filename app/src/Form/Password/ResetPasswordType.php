<?php

declare(strict_types=1);

namespace App\Form\Password;

use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class ResetPasswordType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                child: 'newPassword',
                type: PasswordType::class,
                options: $this->getConfiguration(
                    label: 'New password',
                    placeholder: 'Type your new password ...',
                    options: [
                        'attr' => [
                            'class' => 'form-control form-control-custom',
                            'aria-label' => 'New password',
                        ],
                    ]
                )
            )
            ->add(
                child: 'confirmPassword',
                type: PasswordType::class,
                options: $this->getConfiguration(
                    label: 'Confirm password',
                    placeholder: 'Confirm your new password ...',
                    options: [
                        'attr' => [
                            'class' => 'form-control form-control-custom',
                            'aria-label' => 'Confirm password',
                        ],
                    ]
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
