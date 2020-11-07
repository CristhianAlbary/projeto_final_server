<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'O atributo [:attribute] não pe uma URL válida.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'O atributo [:attribute] deve estar entre [:min] e [:max].',
        'file' => 'O atributo [:attribute] deve estar entre [:min] e [:max] kilobytes.',
        'string' => 'O atributo [:attribute] deve estar entre [:min] e [:max] characters.',
        'array' => 'O atributo [:attribute] deve estar entre [:min] e [:max] items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'O atributo [:attribute] não é uma data válida.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'O atributo [:attribute] deve conter [:digits] digitos.',
    'digits_between' => 'O atributo [:attribute] deve conter de [:min] a [:max] digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'O atributo [:attribute] não é um endereço de email válido.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'O atributo [:attribute] selecionado é inválido.',
    'file' => 'O atributo [:attribute] deve ser um arquivo.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'O atributo [:attribute] deve ser maior que [:value].',
        'file' => 'O atributo [:attribute] deve ser maior que [:value] kilobytes.',
        'string' => 'O atributo [:attribute] deve ser maior que [:value] characters.',
        'array' => 'O atributo [:attribute] deve conter [:value] items.',
    ],
    'gte' => [
        'numeric' => 'O atributo [:attribute] deve ser maior ou igual a [:value].',
        'file' => 'O atributo [:attribute] deve ser maior ou igual a [:value] kilobytes.',
        'string' => 'O atributo [:attribute] deve ser maior ou igual a [:value] characters.',
        'array' => 'O atributo [:attribute] deve conter [:value] items ou mais.',
    ],
    'image' => 'O atributo [:attribute] deve ser uma imagem.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'O atributo [:attribute] deve ser menor que [:value].',
        'file' => 'O atributo [:attribute] deve ser menor que [:value] kilobytes.',
        'string' => 'O atributo [:attribute] deve ser menor que [:value] characters.',
        'array' => 'O atributo [:attribute] deve conter menos que [:value] items.',
    ],
    'lte' => [
        'numeric' => 'O atributo [:attribute] deve ser menor ou igual a [:value].',
        'file' => 'O atributo [:attribute] deve ser menor ou igual a [:value] kilobytes.',
        'string' => 'O atributo [:attribute] deve ser menor ou igual a [:value] characters.',
        'array' => 'o atributo [:attribute] deve conter menos que [:value] items.',
    ],
    'max' => [
        'numeric' => 'O atributo [:attribute] não pode ser maior que [:max].',
        'file' => 'O atributo [:attribute] não pode ser maior que [:max] kilobytes.',
        'string' => 'O atributo [:attribute] não pode conter mais que [:max] characters.',
        'array' => 'O atributo [:attribute] não pode conter mais que [:max] items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'O atributo [:attribute] deve ser maior que [:min].',
        'file' => 'O atributo [:attribute] deve ser maior que [:min] kilobytes.',
        'string' => 'O atributo [:attribute] deve ser maior que [:min] characters.',
        'array' => 'O atributo [:attribute] deve ser maior que [:min] items.',
    ],
    'not_in' => 'O atributo selecionado [:attribute] é inválido.',
    'not_regex' => 'O formato do atributo [:attribute] é inválido.',
    'numeric' => 'O atributo [:attribute] não é um numero.',
    'password' => 'Senha incorrreta.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'O atributo [:attribute] é obrigatório.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'O atributo [:attribute] deve ter o tamanho de [:size].',
        'file' => 'O atributo [:attribute] deve ter o tamanho de [:size] kilobytes.',
        'string' => 'O atributo [:attribute] deve ter o tamanho de [:size] characters.',
        'array' => 'O atributo [:attribute] deve ter o tamanho de [:size] items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'O atributo [:attribute] deve ser uma string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'O atributo [:attribute] deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
