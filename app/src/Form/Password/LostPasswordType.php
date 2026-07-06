<?php

declare(strict_types=1);

namespace App\Form\Password;

use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class LostPasswordType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                child: 'email',
                type: EmailType::class,
                options: $this->getConfiguration(
                    label: 'Email',
                    placeholder: 'Type your email',
                    options: [
                        'attr' => [
                            'class' => 'form-control form-control-custom',
                            'aria-label' => 'Type your email',
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
