<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear;

use Darvis\ModuleVillageroftheyear\Models\Villageroftheyear;
use Illuminate\Http\Request;
use Livewire\Component;
use Darvis\Manta\Traits\MantaTrait;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class VillageroftheyearCreate extends Component
{
    use MantaTrait;
    use VillageroftheyearTrait;

    public function mount(Request $request)
    {
        $this->locale = getLocaleManta();
        if ($request->input('locale') && $request->input('pid')) {
            $item = Villageroftheyear::find($request->input('pid'));
            $this->pid = $item->id;
            $this->locale = $request->input('locale');
            $this->itemOrg = $item;
        }

        if (class_exists(Faker::class) && env('APP_ENV') == 'local') {
            $faker = Faker::create('NL_nl');

            $this->year = $faker->numberBetween(1990, 2022);
            $this->title = $faker->sentence(4);
            $this->excerpt = $faker->text(500);
            $this->slug = Str::of($this->title)->slug('-');
            $this->seo_title = $this->title;
            $this->seo_description = $faker->text(500);
            $this->content = $faker->text(500);
        }

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('create');
    }

    public function render()
    {
        return view('manta::default.manta-default-create')->title($this->config['module_name']['single'] . ' toevoegen');
    }

    public function save()
    {
        $this->validate();

        $row = $this->only(
            'company_id',
            'pid',
            'locale',
            'title',
            'subtitle',
            'slug',
            'seo_title',
            'seo_description',
            'excerpt',
            'content',
            'year',
        );
        $row['created_by'] = auth('staff')->user()->name;
        $row['host'] = request()->host();
        $row['slug'] = $this->slug ? $this->slug : Str::of($this->title)->slug('-');
        Villageroftheyear::create($row);
        // $this->toastr('success', 'Item toegevoegd');

        return $this->redirect(VillageroftheyearList::class);
    }
}
