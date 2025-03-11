<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear;

use Livewire\Component;
use Darvis\ModuleVillageroftheyear\Models\Villageroftheyear;
use Darvis\Manta\Traits\MantaTrait;

class VillageroftheyearUpload extends Component
{
    use MantaTrait;
    use VillageroftheyearTrait;

    public function mount(Villageroftheyear $villageroftheyear)
    {
        $this->item = $villageroftheyear;
        $this->itemOrg = $villageroftheyear;
        $this->id = $this->item->id;
        $this->locale = $this->item->locale;



        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('upload');
    }

    public function render()
    {
        return view('manta::default.manta-default-upload')->title($this->config['module_name']['single'] . ' bestanden');
    }
}
