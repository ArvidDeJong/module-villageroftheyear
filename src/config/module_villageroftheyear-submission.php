<?php

return [
    "tab_title" => "firstname",
    'module_name' => [
        'single' => 'Dorper van het jaar inzending',
        'multiple' => 'Dorper van het jaar inzendingen',
    ],
    'fields' => [
        "uploads" => [
            "active" => true,
            "type" => "",
            "title" => "Uploads",
            "read" => false,
            "required" => false,
        ],
        'locale' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Taal',
            'read' => true,
            "required" => false,
        ],
        'company' => [
            'active' => false,
            'type' => 'false',
            'title' => 'Bedrijf',
            'read' => true,
            "required" => false,
        ],
        'title' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Titel',
            'read' => true,
            "required" => false,
        ],
        'sex' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Geslacht',
            'read' => true,
            "required" => false,
        ],
        'firstname' => [
            'active' => true,
            'type' => 'text',
            'title' => 'Voornaam',
            'read' => true,
            "required" => false,
        ],
        'lastname' => [
            'active' => true,
            'type' => 'text',
            'title' => 'Achternaam',
            'read' => true,
            "required" => false,
        ],
        'email' => [
            'active' => true,
            'type' => 'email',
            'title' => 'E-mail',
            'read' => true,
            "required" => false,
        ],
        'phone' => [
            'active' => true,
            'type' => 'text',
            'title' => 'Telefoon',
            'read' => true,
            "required" => false,
        ],
        'address' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Adres',
            'read' => true,
            "required" => false,
        ],
        'address_nr' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Adres Nummer',
            'read' => true,
            "required" => false,
        ],
        'zipcode' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Postcode',
            'read' => true,
            "required" => false,
        ],
        'city' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Stad',
            'read' => true,
            "required" => false,
        ],
        'country' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Land',
            'read' => true,
            "required" => false,
        ],
        'birthdate' => [
            'active' => false,
            'type' => 'date',
            'title' => 'Geboortedatum',
            'read' => true,
            "required" => false,
        ],
        'newsletters' => [
            'active' => false,
            'type' => 'boolean',
            'title' => 'Nieuwsbrieven',
            'read' => true,
            "required" => false,
        ],
        'subject' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Onderwerp',
            'read' => true,
            "required" => false,
        ],
        'comment' => [
            'active' => true,
            'type' => 'textarea',
            'title' => 'Opmerking',
            'read' => true,
            "required" => false,
        ],
        'internal_contact' => [
            'active' => false,
            'type' => 'text',
            'title' => 'Interne Contactpersoon',
            'read' => true,
            "required" => false,
        ],
        'ip' => [
            'active' => false,
            'type' => 'text',
            'title' => 'IP-adres',
            'read' => true,
            "required" => false,
        ],
    ],
];
