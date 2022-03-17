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

    'accepted'             => "Questo campo deve essere accettato.",
    'active_url'           => "Questo campo non contiene un indirizzo email valido.",
    'after'                => "Questo campo deve essere successivo a :date.",
    'after_or_equal'       => "Questo campo deve essere successivo o uguale a :date.",
    'alpha'                => "Questo campo può contenere solamente lettere.",
    'alpha_dash'           => "Questo campo può contenere solamente lettere, numeri e trattini.",
    'alpha_num'            => "Questo campo può contenere solamente lettere e numeri.",
    'array'                => "Questo campo deve essere un array.",
    'before'               => "Questo campo deve essere una data antecedente a :date.",
    'before_or_equal'      => "Questo campo deve essere una data antecedente o uguale a :date.",
    'between'              => [
        'numeric' => "Questo campo deve essere compreso tra :min e :max.",
        'file'    => "Questo campo deve essere compreso tra :min e :max kilobytes.",
        'string'  => "Questo campo deve essere compreso tra :min and :max caratteri.",
        'array'   => "Questo campo deve essere compreso tra :min and :max elementi.",
    ],
    'boolean'              => "Questo campo deve essere vero o falso.",
    'confirmed'            => "Questo campo non corrisponde.",
    'date'                 => "Questo campo non è una data valida.",
    'date_equals'          => "Questo campo deve essere uguale a :date.",
    'date_format'          => "Questo campo non corrisponde al formato :format.",
    'different'            => "Questo campo e :other devono essere diversi.",
    'digits'               => "Questo campo deve essere lungo :digits caratteri.",
    'digits_between'       => "Questo campo deve essere compreso tra :min e :max caratteri.",
    'dimensions'           => "Le dimensioni immagine di questo campo non sono valide",
    'distinct'             => "Questo campo contiene dei valori duplicati",
    'email'                => "Questo campo deve essere un indirizzo email valido.",
    'exists'               => "L'elemento questo campo selezionato non è valido.",
    'file'                 => "Questo campo deve essere un file.",
    'filled'               => "Questo campo deve essere valorizzato.",
    'gt'                   => [
        'numeric' => "Questo campo deve essere maggiore di :value.",
        'file'    => "Questo campo deve essere più grande di :value kilobytes.",
        'string'  => "Questo campo deve contenere più di :value caratteri.",
        'array'   => "Questo campo deve contenere più di :value elementi.",
    ],
    'gte'                  => [
        'numeric' => "Questo campo deve essere maggiore o uguale di :value.",
        'file'    => "Questo campo deve essere maggiore o uguale a :value kilobytes.",
        'string'  => "Questo campo deve contenere almeno :value caratteri.",
        'array'   => "Questo campo deve contenere almeno :value elementi.",
    ],
    'image'                => "Questo campo deve essere un'immagine.",
    'in'                   => "Questo campo selezionato non è valido.",
    'in_array'             => "Questo campo non esiste in :other.",
    'integer'              => "Questo campo deve essere un intero.",
    'ip'                   => "Questo campo deve essere un indirizzo IP valido.",
    'ipv4'                 => "Questo campo deve essere un indirizzo IPv4 valido.",
    'ipv6'                 => "Questo campo deve essere un indirizzo IPv6 valido.",
    'json'                 => "Questo campo deve contenere una stringa JSON valida.",
    'lt'                   => [
        'numeric' => "Questo campo deve essere inferiore a :value.",
        'file'    => "Questo campo deve essere più piccolo di :value kilobytes.",
        'string'  => "Questo campo deve contenere meno di :value caratteri.",
        'array'   => "Questo campo deve contenere meno di :value elementi.",
    ],
    'lte'                  => [
        'numeric' => "Questo campo deve essere inferiore o uguale a :value.",
        'file'    => "Questo campo deve essere minore o uguale a :value kilobytes.",
        'string'  => "Questo campo deve contenere non più di :value caratteri.",
        'array'   => "Questo campo deve contenere non più di :value elementi.",
    ],
    'max'                  => [
        'numeric' => "Questo campo non può essere superiore a :max.",
        'file'    => "Questo campo non può essere più grande di :max kilobytes.",
        'string'  => "Questo campo non può essere più lungo di :max caratteri.",
        'array'   => "Questo campo non può contenere più di :max elementi.",
    ],
    'mimes'                => "Questo campo deve contenere un file di tipo: :values.",
    'mimetypes'            => "Questo campo deve contenere un file di tipo: :values.",
    'min'                  => [
        'numeric' => "Questo campo deve essere almeno :min.",
        'file'    => "Questo campo deve essere almeno :min kilobyte.",
        'string'  => "Questo campo deve avere almeno :min caratteri.",
        'array'   => "Questo campo deve avere almeno :min elementi.",
    ],
    'not_in'               => "Questo campo selezionato non è valido.",
    'not_regex'            => "Il formato di questo campo non è valido.",
    'numeric'              => "Questo campo deve essere un numero.",
    'present'              => "Questo campo deve essere presente.",
    'regex'                => "Il formato di questo campo non è valido.",
    'required'             => "Questo campo è richiesto.",
    'required_if'          => "Questo campo è richiesto quando :other è :value.",
    'required_unless'      => "Questo campo è richiesto salvo che :other sia in :values.",
    'required_with'        => "Questo campo è richiesto quando :values è presente.",
    'required_with_all'    => "Questo campo è richiesto quando sono presenti :values.",
    'required_without'     => "Questo campo è richiesto quando :values non è presente.",
    'required_without_all' => "Questo campo è richiesto quanto nessuno di :values è presente.",
    'same'                 => "Questo campo e :other devono corrispondere.",
    'size'                 => [
        'numeric' => "Questo campo deve essere :size.",
        'file'    => "Questo campo deve essere :size kilobytes.",
        'string'  => "Questo campo deve essere di :size caratteri.",
        'array'   => "Questo campo deve contenere :size elementi.",
    ],
    'starts_with'          => "Questo campo deve cominciare con uno dei seguenti valori: :values",
    'string'               => "Questo campo deve essere una stringa.",
    'timezone'             => "Questo campo deve essere una zona valida.",
    'unique'               => "Questo campo è già in uso.",
    'uploaded'             => "L'upload di questo campo è fallito",
    'url'                  => "Il formato di questo campo non è valido.",
    'uuid'                 => "Questo campo deve essere un UUID valido.",

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
            'rule-name' => "custom-message",
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