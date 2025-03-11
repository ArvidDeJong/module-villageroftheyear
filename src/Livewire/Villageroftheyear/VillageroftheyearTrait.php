<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear;

use Darvis\ModuleVillageroftheyear\Models\Villageroftheyear;
use DragonCode\Contracts\Http\Builder;
use Livewire\Attributes\Locked;

trait VillageroftheyearTrait
{
    public function __construct()
    {
        $this->route_name = 'villageroftheyear';
        $this->route_list = route($this->route_name . '.list');
        $this->config = module_config('Villageroftheyear');
        $this->fields = $this->config['fields'];
        $this->tab_title = isset($this->config['tab_title']) ? $this->config['tab_title'] : null;
        $this->moduleClass = 'Darvis\ModuleVillageroftheyear\Models\Villageroftheyear';
    }

    public ?Villageroftheyear $item = null;
    public ?Villageroftheyear $itemOrg = null;




    #[Locked]
    public ?string $company_id = null;

    #[Locked]
    public ?string $host = null;

    public ?string $locale = null;
    public ?string $pid = null;

    public ?string $title = null;
    public ?string $subtitle = null;

    public ?string $seo_title = null;
    public ?string $seo_description = null;
    public ?string $tags = null;
    public ?string $excerpt = null;
    public ?string $content = null;
    public ?string $year = null;

    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query->where(function (Builder $querysub) {
                $querysub->where('title', 'LIKE', "%{$this->search}%")
                    ->orWhere('content', 'LIKE', "%{$this->search}%");
            });
    }

    public function rules()
    {
        $return = [];

        // Controleer en voeg validatie toe voor 'title'
        if ($this->fields['title']['active'] == true) {
            $return['title'] = $this->fields['title']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        // Controleer en voeg validatie toe voor 'subtitle'
        if ($this->fields['subtitle']['active'] == true) {
            $return['subtitle'] = $this->fields['subtitle']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        // Controleer en voeg validatie toe voor 'slug'
        if (isset($this->fields['slug']) && $this->fields['slug']['active'] == true) {
            if ($this->item) {
                $return['slug'] = $this->fields['slug']['required'] == true ? 'required|string|max:255|unique:villageroftheyears,slug,' . $this->item->id : 'nullable|string|max:255|unique:villageroftheyears,slug';
            } else {
                $return['slug'] = $this->fields['slug']['required'] == true ? 'required|string|max:255|unique:villageroftheyears,slug' : 'nullable|string|max:255|unique:villageroftheyears,slug';
            }
        }

        // Controleer en voeg validatie toe voor 'seo_title'
        if ($this->fields['seo_title']['active'] == true) {
            $return['seo_title'] = $this->fields['seo_title']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        // Controleer en voeg validatie toe voor 'seo_description'
        if ($this->fields['seo_description']['active'] == true) {
            $return['seo_description'] = $this->fields['seo_description']['required'] == true ? 'required|string|max:160' : 'nullable|string|max:160';
        }

        // Controleer en voeg validatie toe voor 'excerpt'
        if ($this->fields['excerpt']['active'] == true) {
            $return['excerpt'] = $this->fields['excerpt']['required'] == true ? 'required|string|max:500' : 'nullable|string|max:500';
        }

        // Controleer en voeg validatie toe voor 'content'
        if ($this->fields['content']['active'] == true) {
            $return['content'] = $this->fields['content']['required'] == true ? 'required|string' : 'nullable|string';
        }

        // Controleer en voeg validatie toe voor 'year'
        if ($this->fields['year']['active'] == true) {
            $return['year'] = $this->fields['year']['required'] == true ? 'required|integer|min:1900|max:' . date('Y') : 'nullable|integer|min:1900|max:' . date('Y');
        }

        return $return;
    }

    public function messages()
    {
        $return = [];

        // Foutmeldingen voor 'title'
        $return['title.required'] = 'De titel is verplicht.';
        $return['title.string'] = 'De titel moet een geldige tekst zijn.';
        $return['title.max'] = 'De titel mag niet langer zijn dan 255 tekens.';

        // Foutmeldingen voor 'subtitle'
        $return['subtitle.required'] = 'De subtitel is verplicht.';
        $return['subtitle.string'] = 'De subtitel moet een geldige tekst zijn.';
        $return['subtitle.max'] = 'De subtitel mag niet langer zijn dan 255 tekens.';

        // Foutmeldingen voor 'slug'
        $return['slug.required'] = 'De slug is verplicht.';
        $return['slug.string'] = 'De slug moet een geldige tekst zijn.';
        $return['slug.max'] = 'De slug mag niet langer zijn dan 255 tekens.';
        $return['slug.unique'] = 'De slug moet uniek zijn. Een slug met deze waarde bestaat al.';

        // Foutmeldingen voor 'seo_title'
        $return['seo_title.required'] = 'De SEO-titel is verplicht.';
        $return['seo_title.string'] = 'De SEO-titel moet een geldige tekst zijn.';
        $return['seo_title.max'] = 'De SEO-titel mag niet langer zijn dan 255 tekens.';

        // Foutmeldingen voor 'seo_description'
        $return['seo_description.required'] = 'De SEO-omschrijving is verplicht.';
        $return['seo_description.string'] = 'De SEO-omschrijving moet een geldige tekst zijn.';
        $return['seo_description.max'] = 'De SEO-omschrijving mag niet langer zijn dan 160 tekens.';

        // Foutmeldingen voor 'excerpt'
        $return['excerpt.required'] = 'De inleiding is verplicht.';
        $return['excerpt.string'] = 'De inleiding moet een geldige tekst zijn.';
        $return['excerpt.max'] = 'De inleiding mag niet langer zijn dan 500 tekens.';

        // Foutmeldingen voor 'content'
        $return['content.required'] = 'De inhoud is verplicht.';
        $return['content.string'] = 'De inhoud moet een geldige tekst zijn.';

        // Foutmeldingen voor 'year'
        $return['year.required'] = 'Het jaar is verplicht.';
        $return['year.integer'] = 'Het jaar moet een geldig getal zijn.';
        $return['year.min'] = 'Het jaar moet ten minste 1900 zijn.';
        $return['year.max'] = 'Het jaar mag niet later zijn dan het huidige jaar.';

        return $return;
    }
}
