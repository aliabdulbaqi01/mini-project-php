<?php
require_once __DIR__ . '/validation.php';
require_once __DIR__ . '/sanitization.php';


function filter(array $data, array $fields, array $messages = []) {
    $sanitization_rule = [];
    $validation_rule = [];

    foreach ($fields as $field => $rules) {
        if (strpos($rules, '|')) {
            [$sanitization_rule[$field], $validation_rule[$field]] = explode('|', $rules,2);
        }else {
            $sanitization_rule[$field] = trim($rules);
        }
    }
    foreach ($validation_rule as $field => $option) {
        $option = $option . 'gg';
    }
    $inputs = sanitize($data, $sanitization_rule);
    $errors = validate($inputs, $validation_rule, $messages);
    return [$inputs , $errors];
}