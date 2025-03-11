<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission;

use Livewire\Component;
use Illuminate\Http\Request;
use Darvis\ModuleVillageroftheyear\Models\VillageroftheyearSubmission;
use Darvis\Manta\Traits\MantaTrait;

class VillageroftheyearSubmissionRead extends Component
{
    use VillageroftheyearSubmissionTrait;
    use MantaTrait;

    public function mount(Request $request, VillageroftheyearSubmission $villageroftheyearSubmission)
    {
        $this->item = $villageroftheyearSubmission;
        $this->itemOrg = $villageroftheyearSubmission;
        $this->locale = $villageroftheyearSubmission->locale;

        if ($villageroftheyearSubmission) {
            $this->id = $villageroftheyearSubmission->id;
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
