<?php

return [
    "module_name" => [
        "single" => "Case",
        "multiple" => "Case histories"
    ],
    "fields" => [
        "uploads" => [
            "active" => true,
            "type" => "",
            "title" => "Uploads",
            "read" => false,
            "required" => false,
        ],
        "newscat" => [
            "active" => false,
            "type" => "checklist",
            "title" => "Categorieën",
            "options" => [],
            "read" => true,
            "value" => null
        ],
        "author" => [
            "active" => true,
            "type" => "text",
            "title" => "Auteur",
            "read" => true
        ],
        "title" => [
            "active" => true,
            "type" => "text",
            "title" => "Titel",
            "read" => true
        ],
        "title_2" => [
            "active" => true,
            "type" => "text",
            "title" => "Titel 2",
            "read" => true
        ],
        "title_3" => [
            "active" => true,
            "type" => "text",
            "title" => "Titel 3",
            "read" => true
        ],
        "slug" => [
            "active" => true,
            "type" => "text",
            "title" => "Slug",
            "required" => true,
            "read" => true
        ],
        "seo_title" => [
            "active" => true,
            "type" => "text",
            "title" => "SEO Titel",
            "read" => true
        ],
        "seo_description" => [
            "active" => true,
            "type" => "textarea",
            "title" => "SEO Omschrijving",
            "read" => true
        ],
        "tags" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Tags",
            "read" => true
        ],
        "summary" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Opsomming",
            "read" => true
        ],
        "excerpt" => [
            "active" => true,
            "type" => "textarea",
            "title" => "Inleiding",
            "read" => true
        ],
        "content" => [
            "active" => true,
            "type" => "editor",
            "title" => "Content",
            "read" => true
        ]
    ]
];
