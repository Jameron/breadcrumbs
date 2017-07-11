<?php
// php-cs-fixer fix /path/to/dir
$fixers = [
    'blank_line_after_opening_tag' => true,
    'braces' => true,
    'concat_space' => ['spacing' => 'none'],
    'elseif'    => true,
    'no_useless_return' => true,
    'encoding'=>true,
    'single_blank_line_at_eof'=>true,
    'no_blank_lines_after_class_opening' => true,
    'no_spaces_after_function_name' => true,
    'function_declaration' => true,
    'include' => true,
    'indentation_type' => true,
    'single_blank_line_before_namespace' => true,
    'blank_line_after_namespace' => true,
    'no_leading_namespace_whitespace' => true,
    'no_trailing_comma_in_list_call' => true,
    'not_operator_with_successor_space' => true,
    'lowercase_constants' => true,
    'lowercase_keywords' => true,
    'method_argument_space' => true,
    'method_separation' => true,
    'trailing_comma_in_multiline_array' => true,
    'no_multiline_whitespace_before_semicolons' => true,
    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc' => true,
    'object_operator_without_whitespace' => true,
    'binary_operator_spaces' => true,
    'ternary_operator_spaces' => true,
    'unary_operator_spaces' => true,
    'no_spaces_inside_parenthesis' => true,
    'phpdoc_indent' => true,
    'phpdoc_inline_tag' => true,
    'phpdoc_no_access' => true,
    'phpdoc_no_package' => true,
    'phpdoc_scalar' => true,
    'phpdoc_to_comment' => true,
    'phpdoc_trim' => true,
    'phpdoc_types' => true,
    'phpdoc_var_without_name' => true,
    'no_leading_import_slash' => true,
    'ordered_imports'=> ['sortAlgorithm'=>'length'],
    'self_accessor' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_short_echo_tag' => true,
    'no_short_bool_cast' => true,
    'no_trailing_comma_in_singleline_array' => true,
    'single_line_after_imports' => true,
    'single_quote' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'cast_spaces' => true,
    'standardize_not_equals' => true,
    'ternary_operator_spaces' => true,
    'no_trailing_whitespace' => true,
    'trim_array_spaces' => true,
    'no_unused_imports' => true,
    'visibility_required' => true,
    'no_whitespace_in_blank_line' => true,
    'no_multiline_whitespace_around_double_arrow' => true
];

$finder = PhpCsFixer\Finder::create()
    ->exclude('somedir')
    ->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules($fixers)
    ->setFinder($finder)
;
