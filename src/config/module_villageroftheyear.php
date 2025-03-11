<?php

return [
    "tab_title" => "firstname",
    'module_name' => [
        'single' => 'Dorper van het jaar',
        'multiple' => 'Dorper van het jaar',
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
        'year' => [
            'active' => true,
            'type' => 'number',
            'title' => 'Jaar',
            'read' => true,
            'step' => 1,
            "required" => true,
        ],
        'title' => [
            'active' => true,
            'type' => 'text',
            'title' => 'Titel',
            'read' => true,
            "required" => true,
        ],
        'subtitle' => [
            'active' => true,
            'type' => 'text',
            'title' => 'Subtitel',
            'read' => true,
            "required" => false,
        ],
        'slug' => [
            'active' => true,
            'type' => 'text',
            'title' => 'Slug',
            'read' => true,
            "required" => false,
        ],
        'seo_title' => [
            'active' => true,
            'type' => 'text',
            'title' => 'SEO Titel',
            'read' => true,
            "required" => false,
        ],
        'seo_description' => [
            'active' => true,
            'type' => 'textarea',
            'title' => 'SEO Beschrijving',
            'read' => true,
            "required" => false,
        ],
        'excerpt' => [
            'active' => true,
            'type' => 'textarea',
            'title' => 'Samenvatting',
            'read' => true,
            "required" => false,
        ],
        'content' => [
            'active' => true,
            'type' => 'wysiwyg',
            'title' => 'Inhoud',
            'read' => true,
            "required" => false,
        ],
    ],
];
