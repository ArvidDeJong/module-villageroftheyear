# News Module voor Manta CMS

Een Laravel package voor het beheren van nieuwsberichten in het Manta CMS.

## Installatie

Je kunt dit package installeren via Composer:

```bash
composer require darvis/module-news
```

## Features

- Nieuwsberichten beheren
  - Toevoegen, bewerken en verwijderen van nieuwsberichten
  - Ondersteuning voor titel, inhoud en SEO metadata
  - Slug generatie voor URL's
- Categorieën
  - Beheer van nieuwscategorieën
  - Koppeling tussen nieuws en categorieën
- Manta CMS Integratie
  - Volledig geïntegreerd met het Manta CMS
  - Gebruik van Livewire voor real-time interactie
  - Flux UI componenten

## Configuratie

Publiceer de configuratie:

```bash
php artisan vendor:publish --provider="Darvis\ModuleNews\NewsServiceProvider" --tag="module-news-config"
```

Publiceer de views (optioneel):

```bash
php artisan vendor:publish --provider="Darvis\ModuleNews\NewsServiceProvider" --tag="module-news-views"
```

## Vereisten

- PHP 8.3 of hoger
- Laravel 11.0 of hoger
- Livewire 3.0 of hoger
- Livewire Flux 2.0 of hoger
- Darvis Manta CMS 1.0 of hoger

## Licentie

Dit package is open-source software gelicentieerd onder de [MIT licentie](LICENSE.md).