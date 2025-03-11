<?php

namespace Darvis\ModuleNews\Livewire\News;

use Livewire\Component;
use Darvis\ModuleNews\Models\News;
use Darvis\Manta\Traits\MantaTrait;

class NewsUpload extends Component
{
    use MantaTrait;
    use NewsTrait;

    public function mount(News $news)
    {
        $this->item = $news;
        $this->itemOrg = $news;
        $this->id = $news->id;
        $this->locale = $news->locale;

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('upload');
    }

    public function render()
    {
        return view('manta::default.manta-default-upload')->title($this->config['module_name']['single'] . ' bestanden');
    }
}
