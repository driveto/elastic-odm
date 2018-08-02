<?php

$finder = PhpCsFixer\Finder::create()
    ->in(['src', 'tests']);

$standardRules = [
    '@PSR1' => true,
    '@PSR2' => true,
    '@Symfony' => true,
];
$standAloneRules = [
    'declare_strict_types' => true,
    'strict_param' => true,
    'strict_comparison' => true,
    'semicolon_after_instruction' => true,
    'mb_str_functions' => true,
    'array_syntax' => ['syntax' => 'short'],
];
$overrideStandardRules = [
    'trailing_comma_in_multiline_array' => false,
    'phpdoc_align' => false,
    'phpdoc_indent' => false,
    'phpdoc_annotation_without_dot' => false,
    'phpdoc_separation' => false,
    'pre_increment' => false
];

return PhpCsFixer\Config::create()
    ->setRules(
        array_merge($standardRules, $standAloneRules, $overrideStandardRules)
    )
    ->setCacheFile(__DIR__.'/var/cache/.php-cs-fixer.cache')
    ->setFinder($finder);
