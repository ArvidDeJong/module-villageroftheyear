<?php

namespace Darvis\ModuleNews\Livewire\News;

use Darvis\ModuleNews\Models\News;
use Livewire\Component;
use Darvis\Manta\Traits\SortableTrait;
use Darvis\Manta\Traits\MantaTrait;
use Darvis\Manta\Traits\WithSortingTrait;
use Livewire\WithPagination;
use Darvis\Manta\Services\Manta;

class NewsList extends Component
{
    use NewsTrait;
    use WithPagination;
    use SortableTrait;
    use MantaTrait;
    use WithSortingTrait;

    public function mount()
    {
        $this->getBreadcrumb();
    }

    public function render()
    {
        $this->trashed = count(News::whereNull('pid')->onlyTrashed()->get());

        $obj = News::whereNull('pid');
        if ($this->tablistShow == 'trashed') {
            $obj->onlyTrashed();
        }
        $obj = $this->applySorting($obj);
        $obj = $this->applySearch($obj);
        $items = $obj->paginate(50);
        return view('module-news::livewire.news.news-list', ['items' => $items])->title($this->config['module_name']['multiple']);
    }
}
