<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission;

use Livewire\Component;
use Livewire\WithPagination;
use Darvis\Manta\Traits\SortableTrait;
use Darvis\Manta\Traits\MantaTrait;
use Darvis\Manta\Traits\WithSortingTrait;
use Illuminate\Support\Facades\View;
use Darvis\ModuleVillageroftheyear\Models\VillageroftheyearSubmission;
use Illuminate\Database\Eloquent\Builder;

class VillageroftheyearSubmissionList extends Component
{
    use WithPagination;
    use SortableTrait;
    use MantaTrait;
    use WithSortingTrait;
    use VillageroftheyearSubmissionTrait;

    public function mount()
    {
        $this->sortBy = 'created_at';
        $this->sortDirection = 'desc';
        $this->getBreadcrumb();
    }

    public function render()
    {
        $this->trashed = count(VillageroftheyearSubmission::whereNull('pid')->onlyTrashed()->get());

        $obj = VillageroftheyearSubmission::whereNull('pid');
        if ($this->tablistShow == 'trashed') {
            $obj->onlyTrashed();
        }
        $obj = $this->applySorting($obj);
        $obj = $this->applySearch($obj);
        $items = $obj->paginate(50);
        return view('module-villageroftheyear::livewire.villageroftheyear-submission.villageroftheyear-submission-list', ['items' => $items])->title($this->config['module_name']['multiple']);
    }
}
