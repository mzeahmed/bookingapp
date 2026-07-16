<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
    ->notPath([
        'config/bundles.php',
        'config/reference.php',
    ])
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'no_unused_imports' => true,

        'declare_strict_types' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'fully_qualified_strict_types' => [
            'leading_backslash_in_global_namespace' => true,
        ],
        'phpdoc_separation' => true,
        'not_operator_with_successor_space' => false,
        'single_line_empty_body' => false,
        'curly_braces_position' => [
            'allow_single_line_empty_anonymous_classes' => false,
            'allow_single_line_anonymous_functions' => false,
        ],
        'phpdoc_align' => [
            'align' => 'left',
        ],
        'ordered_imports' => [
            'sort_algorithm' => 'length',
        ],
        'trailing_comma_in_multiline' => true,
        'binary_operator_spaces' => [
            'default' => 'single_space',
        ],
        'no_extra_blank_lines' => true,
        'no_whitespace_in_blank_line' => true,
        'single_space_around_construct' => true,
        'unary_operator_spaces' => true,
        'phpdoc_single_line_var_spacing' => true,
        'types_spaces' => [
            'space' => 'none',
        ],
        'concat_space' => [
            'spacing' => 'one',
        ],
        'align_multiline_comment' => false,
        'single_quote' => true,
        'class_attributes_separation' => [
            'elements' => [
                'method' => 'one',
            ],
        ],
        'combine_consecutive_unsets' => true,
        'combine_consecutive_issets' => true,
        'type_declaration_spaces' => true,
        'statement_indentation' => [
            'stick_comment_to_next_continuous_control_statement' => true,
        ],
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder)
;
