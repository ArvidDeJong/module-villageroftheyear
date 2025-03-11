<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission;

use Livewire\Component;
use Darvis\Manta\Traits\TableRowTrait;

class VillageroftheyearSubmissionRow extends Component
{
    use VillageroftheyearSubmissionTrait;
    use TableRowTrait;

    public function render()
    {
        return view('module-villageroftheyear::livewire.villageroftheyear-submission.villageroftheyear-submission-row');
    }
}
