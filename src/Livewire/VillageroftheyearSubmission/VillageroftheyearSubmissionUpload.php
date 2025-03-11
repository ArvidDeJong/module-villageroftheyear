<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission;

use Darvis\ModuleVillageroftheyear\Models\VillageroftheyearSubmission;
use Livewire\Component;
use Darvis\Manta\Traits\MantaTrait;

class VillageroftheyearSubmissionUpload extends Component
{
    use MantaTrait;
    use VillageroftheyearSubmissionTrait;

    public function mount(VillageroftheyearSubmission $villageroftheyearSubmission)
    {
        $this->item = $villageroftheyearSubmission;
        $this->itemOrg = $villageroftheyearSubmission;
        $this->id = $villageroftheyearSubmission->id;
        $this->locale = $villageroftheyearSubmission->locale;

        $this->getLocaleInfo();
        $this->getBreadcrumb('upload');
        $this->getTablist();
    }

    public function render()
    {
        return view('manta::default.manta-default-upload')->title($this->config['module_name']['single'] . ' bestanden');
    }
}
