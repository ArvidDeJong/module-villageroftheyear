<?php

namespace Darvis\ModuleNews\Livewire\Newscat;

use Darvis\ModuleNews\Models\Newscat;
use Darvis\Manta\Services\Openai;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Locked;
use Illuminate\Support\Str;

trait NewscatTrait
{
    public function __construct()
    {
        $this->route_name = 'newscat';
        $this->route_list = route($this->route_name . '.list');
        $this->config = module_config('Newscat');
        $this->fields = $this->config['fields'];
        $this->moduleClass = 'Manta\Models\Newscat';
        $this->tab_title = isset($this->config['tab_title']) ? $this->config['tab_title'] : null;
    }

    public ?Newscat $item = null;
    public ?Newscat $itemOrg = null;

    #[Locked]
    public ?string $company_id = null;

    #[Locked]
    public ?string $host = null;

    public ?string $locale = null;
    public ?string $pid = null;
    public ?string $title = null;
    public ?string $title_2 = null;

    public ?string $seo_title = null;
    public ?string $seo_description = null;
    public ?string $tags = null;
    public ?string $summary = null;
    public ?string $excerpt = null;
    public ?string $content = null;


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

        if ($this->fields['locale']['active'] == true && $this->fields['locale']['required'] == true) {
            $return['locale'] = 'nullable|string|max:255';
        }

        if ($this->fields['title']['active'] == true && $this->fields['title']['required'] == true) {
            $return['title'] = 'nullable|string|max:255';
        }

        if ($this->fields['title_2']['active'] == true && $this->fields['title_2']['required'] == true) {
            $return['title_2'] = 'nullable|string|max:255';
        }

        if ($this->fields['slug']['active'] == true && $this->fields['slug']['required'] == true) {
            $return['slug'] = 'nullable|string|max:255';
        }

        if ($this->fields['seo_title']['active'] == true && $this->fields['seo_title']['required'] == true) {
            $return['seo_title'] = 'nullable|string|max:255';
        }

        if ($this->fields['seo_description']['active'] == true && $this->fields['seo_description']['required'] == true) {
            $return['seo_description'] = 'nullable|string|max:255';
        }

        if ($this->fields['tags']['active'] == true && $this->fields['tags']['required'] == true) {
            $return['tags'] = 'nullable|string|max:255';
        }

        if ($this->fields['summary']['active'] == true && $this->fields['summary']['required'] == true) {
            $return['summary'] = 'nullable|string|max:255';
        }

        if ($this->fields['excerpt']['active'] == true && $this->fields['excerpt']['required'] == true) {
            $return['excerpt'] = 'nullable|string|max:255';
        }

        if ($this->fields['content']['active'] == true && $this->fields['content']['required'] == true) {
            $return['content'] = 'nullable|string';
        }

        return $return;
    }

    public function messages()
    {
        return [
            'locale.required' => 'De taal is verplicht',
            'pid.required' => 'Het PID-veld is verplicht',
            'title.required' => 'De titel is verplicht',
            'title_2.required' => 'De tweede titel is verplicht',
            'slug.required' => 'De slug is verplicht',
            'seo_title.required' => 'De SEO-titel is verplicht',
            'seo_description.required' => 'De SEO-beschrijving is verplicht',
            'tags.required' => 'De tags zijn verplicht',
            'summary.required' => 'De samenvatting is verplicht',
            'excerpt.required' => 'De inleiding is verplicht',
            'content.required' => 'De inhoud is verplicht',
        ];
    }
}
