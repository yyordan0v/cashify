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

    'accepted' => 'Полето :attribute трябва да бъде прието.',
    'accepted_if' => 'Полето :attribute трябва да бъде прието, когато :other е :value.',
    'active_url' => 'Полето :attribute трябва да бъде валиден URL адрес.',
    'after' => 'Полето :attribute трябва да бъде дата след :date.',
    'after_or_equal' => 'Полето :attribute трябва да бъде дата след или равна на :date.',
    'alpha' => 'Полето :attribute трябва да съдържа само букви.',
    'alpha_dash' => 'Полето :attribute трябва да съдържа само букви, цифри, тирета и долни черти.',
    'alpha_num' => 'Полето :attribute трябва да съдържа само букви и цифри.',
    'array' => 'Полето :attribute трябва да бъде масив.',
    'ascii' => 'Полето :attribute трябва да съдържа само еднобайтови буквено-цифрови знаци и символи.',
    'before' => 'Полето :attribute трябва да бъде дата преди :date.',
    'before_or_equal' => 'Полето :attribute трябва да бъде дата преди или равна на :date.',
    'between' => [
        'array' => 'Полето :attribute трябва да има между :min и :max елемента.',
        'file' => 'Полето :attribute трябва да бъде между :min и :max килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде между :min и :max.',
        'string' => 'Полето :attribute трябва да бъде между :min и :max знака.',
    ],
    'boolean' => 'Полето :attribute трябва да бъде истина или лъжа.',
    'can' => 'Полето :attribute съдържа неразрешена стойност.',
    'confirmed' => 'Потвърждението на полето :attribute не съвпада.',
    'contains' => 'Полето :attribute не съдържа задължителна стойност.',
    'current_password' => 'Паролата е неправилна.',
    'date' => 'Полето :attribute трябва да бъде валидна дата.',
    'date_equals' => 'Полето :attribute трябва да бъде дата, равна на :date.',
    'date_format' => 'Полето :attribute не съответства на формата :format.',
    'decimal' => 'Полето :attribute трябва да има :decimal десетични знака.',
    'declined' => 'Полето :attribute трябва да бъде отхвърлено.',
    'declined_if' => 'Полето :attribute трябва да бъде отхвърлено, когато :other е :value.',
    'different' => 'Полетата :attribute и :other трябва да са различни.',
    'digits' => 'Полето :attribute трябва да бъде :digits цифри.',
    'digits_between' => 'Полето :attribute трябва да бъде между :min и :max цифри.',
    'dimensions' => 'Полето :attribute има невалидни размери на изображението.',
    'distinct' => 'Полето :attribute има дублирана стойност.',
    'doesnt_end_with' => 'Полето :attribute не трябва да завършва с едно от следните: :values.',
    'doesnt_start_with' => 'Полето :attribute не трябва да започва с едно от следните: :values.',
    'email' => 'Полето :attribute трябва да бъде валиден имейл адрес.',
    'ends_with' => 'Полето :attribute трябва да завършва с едно от следните: :values.',
    'enum' => 'Избраният :attribute е невалиден.',
    'exists' => 'Избраният :attribute е невалиден.',
    'extensions' => 'Полето :attribute трябва да има едно от следните разширения: :values.',
    'file' => 'Полето :attribute трябва да бъде файл.',
    'filled' => 'Полето :attribute трябва да има стойност.',
    'gt' => [
        'array' => 'Полето :attribute трябва да има повече от :value елемента.',
        'file' => 'Полето :attribute трябва да бъде по-голямо от :value килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде по-голямо от :value.',
        'string' => 'Полето :attribute трябва да бъде по-дълго от :value знака.',
    ],
    'gte' => [
        'array' => 'Полето :attribute трябва да има :value елемента или повече.',
        'file' => 'Полето :attribute трябва да бъде по-голямо или равно на :value килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде по-голямо или равно на :value.',
        'string' => 'Полето :attribute трябва да бъде по-дълго или равно на :value знака.',
    ],
    'hex_color' => 'Полето :attribute трябва да бъде валиден шестнадесетичен цвят.',
    'image' => 'Полето :attribute трябва да бъде изображение.',
    'in' => 'Избраният :attribute е невалиден.',
    'in_array' => 'Полето :attribute трябва да съществува в :other.',
    'integer' => 'Полето :attribute трябва да бъде цяло число.',
    'ip' => 'Полето :attribute трябва да бъде валиден IP адрес.',
    'ipv4' => 'Полето :attribute трябва да бъде валиден IPv4 адрес.',
    'ipv6' => 'Полето :attribute трябва да бъде валиден IPv6 адрес.',
    'json' => 'Полето :attribute трябва да бъде валиден JSON низ.',
    'list' => 'Полето :attribute трябва да бъде списък.',
    'lowercase' => 'Полето :attribute трябва да бъде с малки букви.',
    'lt' => [
        'array' => 'Полето :attribute трябва да има по-малко от :value елемента.',
        'file' => 'Полето :attribute трябва да бъде по-малко от :value килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде по-малко от :value.',
        'string' => 'Полето :attribute трябва да бъде по-кратко от :value знака.',
    ],
    'lte' => [
        'array' => 'Полето :attribute не трябва да има повече от :value елемента.',
        'file' => 'Полето :attribute трябва да бъде по-малко или равно на :value килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде по-малко или равно на :value.',
        'string' => 'Полето :attribute трябва да бъде по-кратко или равно на :value знака.',
    ],
    'mac_address' => 'Полето :attribute трябва да бъде валиден MAC адрес.',
    'max' => [
        'array' => 'Полето :attribute не трябва да има повече от :max елемента.',
        'file' => 'Полето :attribute не трябва да бъде по-голямо от :max килобайта.',
        'numeric' => 'Полето :attribute не трябва да бъде по-голямо от :max.',
        'string' => 'Полето :attribute не трябва да бъде по-дълго от :max знака.',
    ],
    'max_digits' => 'Полето :attribute не трябва да има повече от :max цифри.',
    'mimes' => 'Полето :attribute трябва да бъде файл от тип: :values.',
    'mimetypes' => 'Полето :attribute трябва да бъде файл от тип: :values.',
    'min' => [
        'array' => 'Полето :attribute трябва да има поне :min елемента.',
        'file' => 'Полето :attribute трябва да бъде поне :min килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде поне :min.',
        'string' => 'Полето :attribute трябва да бъде поне :min знака.',
    ],
    'min_digits' => 'Полето :attribute трябва да има поне :min цифри.',
    'missing' => 'Полето :attribute трябва да липсва.',
    'missing_if' => 'Полето :attribute трябва да липсва, когато :other е :value.',
    'missing_unless' => 'Полето :attribute трябва да липсва, освен ако :other е :value.',
    'missing_with' => 'Полето :attribute трябва да липсва, когато :values присъства.',
    'missing_with_all' => 'Полето :attribute трябва да липсва, когато :values присъстват.',
    'multiple_of' => 'Полето :attribute трябва да бъде кратно на :value.',
    'not_in' => 'Избраният :attribute е невалиден.',
    'not_regex' => 'Форматът на полето :attribute е невалиден.',
    'numeric' => 'Полето :attribute трябва да бъде число.',
    'password' => [
        'letters' => 'Полето :attribute трябва да съдържа поне една буква.',
        'mixed' => 'Полето :attribute трябва да съдържа поне една главна и една малка буква.',
        'numbers' => 'Полето :attribute трябва да съдържа поне едно число.',
        'symbols' => 'Полето :attribute трябва да съдържа поне един символ.',
        'uncompromised' => 'Даденият :attribute се е появил при изтичане на данни. Моля, изберете различен :attribute.',
    ],
    'present' => 'Полето :attribute трябва да присъства.',
    'present_if' => 'Полето :attribute трябва да присъства, когато :other е :value.',
    'present_unless' => 'Полето :attribute трябва да присъства, освен ако :other е :value.',
    'present_with' => 'Полето :attribute трябва да присъства, когато :values присъства.',
    'present_with_all' => 'Полето :attribute трябва да присъства, когато :values присъстват.',
    'prohibited' => 'Полето :attribute е забранено.',
    'prohibited_if' => 'Полето :attribute е забранено, когато :other е :value.',
    'prohibited_unless' => 'Полето :attribute е забранено, освен ако :other е в :values.',
    'prohibits' => 'Полето :attribute забранява присъствието на :other.',
    'regex' => 'Форматът на полето :attribute е невалиден.',
    'required' => 'Полето :attribute е задължително.',
    'required_array_keys' => 'Полето :attribute трябва да съдържа записи за: :values.',
    'required_if' => 'Полето :attribute е задължително, когато :other е :value.',
    'required_if_accepted' => 'Полето :attribute е задължително, когато :other е прието.',
    'required_if_declined' => 'Полето :attribute е задължително, когато :other е отказано.',
    'required_unless' => 'Полето :attribute е задължително, освен ако :other е в :values.',
    'required_with' => 'Полето :attribute е задължително, когато :values присъства.',
    'required_with_all' => 'Полето :attribute е задължително, когато :values присъстват.',
    'required_without' => 'Полето :attribute е задължително, когато :values не присъства.',
    'required_without_all' => 'Полето :attribute е задължително, когато нито едно от :values не присъства.',
    'same' => 'Полето :attribute трябва да съвпада с :other.',
    'size' => [
        'array' => 'Полето :attribute трябва да съдържа :size елемента.',
        'file' => 'Полето :attribute трябва да бъде :size килобайта.',
        'numeric' => 'Полето :attribute трябва да бъде :size.',
        'string' => 'Полето :attribute трябва да бъде :size знака.',
    ],
    'starts_with' => 'Полето :attribute трябва да започва с едно от следните: :values.',
    'string' => 'Полето :attribute трябва да бъде низ.',
    'timezone' => 'Полето :attribute трябва да бъде валидна часова зона.',
    'unique' => 'Полето :attribute вече е заето.',
    'uploaded' => 'Качването на :attribute се провали.',
    'uppercase' => 'Полето :attribute трябва да бъде с главни букви.',
    'url' => 'Полето :attribute трябва да бъде валиден URL адрес.',
    'ulid' => 'Полето :attribute трябва да бъде валиден ULID.',
    'uuid' => 'Полето :attribute трябва да бъде валиден UUID.',

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
            'rule-name' => 'персонализирано-съобщение',
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

    'attributes' => [
        'category' => 'категория',
        'category_id' => 'категория',
        'account' => 'сметка',
        'account_id' => 'сметка',
        'amount' => 'сума',
        'title' => 'заглавие',
        'details' => 'детайли',
        'name' => 'име',
        'balance' => 'баланс',
        'color' => 'цвят',
        'to_account' => 'към сметка',
        'type' => 'тип',
        'current_password' => 'текуща парола',
        'password' => 'парола',
        'email' => 'електронна поща',
    ],

];
