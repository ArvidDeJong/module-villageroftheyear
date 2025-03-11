<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear;

use Livewire\Component;
use Darvis\ModuleVillageroftheyear\Models\Villageroftheyear;
use Darvis\Manta\Traits\SortableTrait;
use Darvis\Manta\Traits\WithSortingTrait;
use Livewire\WithPagination;
use Darvis\Manta\Traits\MantaTrait;

class VillageroftheyearList extends Component
{
    use VillageroftheyearTrait;
    use WithPagination;
    use SortableTrait;
    use MantaTrait;
    use WithSortingTrait;

    public function mount()
    {
        $this->sortBy = 'year';
        $this->sortDirection = 'desc';
        $this->getBreadcrumb();
    }

    public function render()
    {
        $this->trashed = count(Villageroftheyear::whereNull('pid')->onlyTrashed()->get());

        $obj = Villageroftheyear::whereNull('pid');
        if ($this->tablistShow == 'trashed') {
            $obj->onlyTrashed();
        }
        $obj = $this->applySorting($obj);
        $obj = $this->applySearch($obj);
        $items = $obj->paginate(50);
        return view('module-villageroftheyear::livewire.villageroftheyear.villageroftheyear-list', ['items' => $items])->title($this->config['module_name']['multiple']);
    }
}
