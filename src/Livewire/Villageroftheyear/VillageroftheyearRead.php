<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear;

use Livewire\Component;
use Darvis\ModuleVillageroftheyear\Models\Villageroftheyear;
use Illuminate\Http\Request;
use Darvis\Manta\Traits\MantaTrait;

class VillageroftheyearRead extends Component
{
    use VillageroftheyearTrait;
    use MantaTrait;

    public function mount(Villageroftheyear $villageroftheyear)
    {
        $this->item = $villageroftheyear;
        $this->itemOrg = $villageroftheyear;
        $this->locale = $this->item->locale;

        if ($this->item) {
            $this->id = $this->item->id;
        }
        $this->getLocaleInfo();
        $this->getBreadcrumb('read');
        $this->getTablist();
    }

    public function render()
    {
        return view('manta::default.manta-default-read')->title($this->config['module_name']['single'] . ' bekijken');
    }
}
