<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear;

use Flux\Flux;
use Livewire\Component;
use Darvis\ModuleVillageroftheyear\Models\Villageroftheyear;
use Illuminate\Http\Request;
use Darvis\Manta\Traits\MantaTrait;

class VillageroftheyearUpdate extends Component
{
    use MantaTrait;
    use VillageroftheyearTrait;

    public function mount(Request $request, Villageroftheyear $villageroftheyear)
    {
        $this->item = $villageroftheyear;
        $this->itemOrg = $villageroftheyear;
        $this->locale = $this->item->locale;

        if ($this->item) {
            $this->id = $this->item->id;
        }

        $this->fill(
            $this->item->only(
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
            ),
        );
        $this->getLocaleInfo();
        $this->getBreadcrumb('update');
        $this->getTablist();
    }

    public function render()
    {
        return view('manta::default.manta-default-update')->title($this->config['module_name']['single'] . ' aanpassen');
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
        $row['updated_by'] = auth('staff')->user()->name;
        Villageroftheyear::where('id', $this->id)->update($row);

        // return redirect()->to(route($this->route_name . '.list'));
        Flux::toast('Opgeslagen', duration: 1000, variant: 'success');
    }
}
