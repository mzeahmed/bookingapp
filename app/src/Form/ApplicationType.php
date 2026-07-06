<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;

/**
 * Base class for the application's form types.
 *
 * Provides a helper to build a Symfony form field option array with a
 * standardized label/placeholder shape, so concrete form types don't
 * repeat that boilerplate for every field.
 */
class ApplicationType extends AbstractType
{
    /**
     * Build a field option array with a label and a placeholder attribute.
     *
     * Any extra $options are merged recursively on top of the
     * label/placeholder defaults, so nested keys (e.g. 'attr') are combined
     * rather than overwritten, and can override 'label' or 'placeholder'
     * if needed.
     *
     * @param string|bool $label field label, or false to disable it
     * @param string $placeholder placeholder text for the 'attr' option
     * @param array $options additional field options to merge in
     *
     * @return array the merged field options, ready to pass to $builder->add()
     */
    protected function getConfiguration(string | bool $label, string $placeholder, array $options = []): array
    {
        return array_merge_recursive([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder,
            ],
        ], $options);
    }
}
