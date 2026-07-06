<?php

declare(strict_types=1);

namespace App\Form\Password;

use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class PasswordUpdateType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                child: 'oldPassword',
                type: PasswordType::class,
                options: $this->getConfiguration(
                    label: 'Old password',
                    placeholder: 'Enter your current password ...'
                )
            )
            ->add(
                child: 'newPassword',
                type: PasswordType::class,
                options: $this->getConfiguration(
                    label: 'New password',
                    placeholder: 'Type your new password ...'
                )
            )
            ->add(
                child: 'confirmPassword',
                type: PasswordType::class,
                options: $this->getConfiguration(
                    label: 'Confirm password',
                    placeholder: 'Confirm your new password ...'
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
