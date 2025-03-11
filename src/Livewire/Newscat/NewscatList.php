<?php

namespace Darvis\ModuleNews\Livewire\Newscat;

use Darvis\ModuleNews\Models\Newscat;
use Livewire\Component;
use Darvis\Manta\Traits\SortableTrait;
use Darvis\Manta\Traits\MantaTrait;
use Darvis\Manta\Traits\WithSortingTrait;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\WithPagination;

class NewscatList extends Component
{
    use NewscatTrait;
    use WithPagination;
    use SortableTrait;
    use MantaTrait;
    use WithSortingTrait;

    public function mount()
    {
        $this->getBreadcrumb('list', [
            'parents' =>
            [
                ['url' => route('news.list'), 'title' => module_config('News')['module_name']['multiple']]
            ]
        ]);
        $this->sortBy = 'sort';
        $this->sortDirection = 'asc';
    }

    public function render()
    {
        $this->trashed = count(Newscat::whereNull('pid')->onlyTrashed()->get());

        $obj = Newscat::whereNull('pid');
        if ($this->tablistShow == 'trashed') {
            $obj->onlyTrashed();
        }
        $obj = $this->applySorting($obj);
        $obj = $this->applySearch($obj);
        $items = $obj->paginate(50);
        return view('livewire.manta.newscat.newscat-list', ['items' => $items])->title($this->config['module_name']['multiple']);
    }
}
