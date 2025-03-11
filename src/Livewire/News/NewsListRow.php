<?php

namespace Darvis\ModuleNews\Livewire\News;

use Livewire\Component;
use Darvis\ModuleNews\Livewire\News\NewsTrait;
use Darvis\Manta\Traits\TableRowTrait;

class NewsListRow extends Component
{
    use NewsTrait;
    use TableRowTrait;

    public function render()
    {
        return view('module-news::livewire.news.news-list-row');
    }
}
