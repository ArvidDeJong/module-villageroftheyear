# Module Villager of the Year

Een Manta CMS module voor Laravel om een "Dorpeling van het jaar" formulier toe te voegen aan je website.

## Vereisten

- PHP ^8.3
- Laravel ^11.0
- Livewire ^3.0
- Livewire Flux ^2.0
- Darvis Manta ^1.0

## Installatie

1. Voeg de repository toe aan je `composer.json`:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/darvis-nl/module-villageroftheyear"
        }
    ]
}
```

2. Installeer het package via Composer:

```bash
composer require darvis/module-villageroftheyear
```

De service provider wordt automatisch geregistreerd via Laravel's package discovery.

## Configuratie

Publiceer de configuratie bestanden:

```bash
php artisan vendor:publish --tag=villageroftheyear-config
```

### E-mail Configuratie

De module gebruikt de volgende e-mail instellingen die je kunt configureren in je `.env` bestand:

```env
MAIL_TO_ADDRESS=your@email.com
```

Je kunt ook meerdere ontvangers configureren via de Manta CMS instellingen onder `VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS`. Dit is een JSON array met e-mailadressen.

## Componenten

De module bevat de volgende Livewire componenten:

### Villager of the Year
- `villageroftheyear-list` - Overzicht van alle dorpelingen
- `villageroftheyear-create` - Formulier voor nieuwe dorpelingen
- `villageroftheyear-update` - Bewerk formulier voor bestaande dorpelingen
- `villageroftheyear-read` - Detail weergave van een dorpeling
- `villageroftheyear-settings` - Beheer instellingen voor de module
- `villageroftheyear-upload` - Upload component voor bestanden

### Villager of the Year Submission
- `villageroftheyear-submission-list` - Overzicht van alle inzendingen
- `villageroftheyear-submission-create` - Formulier voor nieuwe inzendingen
- `villageroftheyear-submission-update` - Bewerk formulier voor bestaande inzendingen
- `villageroftheyear-submission-read` - Detail weergave van een inzending
- `villageroftheyear-submission-settings` - Beheer instellingen voor de module
- `villageroftheyear-submission-button-email` - E-mail knop component voor het versturen van bevestigingen
- `villageroftheyear-submission-upload` - Upload component voor bestanden

## Views

De views kunnen worden aangepast door ze te publiceren:

```bash
php artisan vendor:publish --tag=villageroftheyear-views
```

## Vertalingen

Publiceer de vertalingen om ze aan te passen:

```bash
php artisan vendor:publish --tag=villageroftheyear-lang
```

## Database

De module installeert automatisch de benodigde database tabellen via migrations. Deze worden uitgevoerd tijdens de installatie.

## Gebruik

### Formulier Toevoegen

Voeg het inzendformulier toe aan je Blade template:

```blade
<livewire:villageroftheyear-submission-create />
```

### Beheer Overzicht

Het beheer overzicht is beschikbaar via de Manta CMS admin interface:

```blade
<livewire:villageroftheyear-list />
```

## Credits

Ontwikkeld door [Darvis](https://www.darvis.nl)

## Licentie

MIT License