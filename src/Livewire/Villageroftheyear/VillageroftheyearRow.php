<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear;

use Darvis\Manta\Traits\TableRowTrait;
use Livewire\Component;

class VillageroftheyearRow extends Component
{
    use VillageroftheyearTrait;
    use TableRowTrait;

    public function render()
    {
        return view('module-villageroftheyear::livewire.villageroftheyear.villageroftheyear-row');
    }
}
