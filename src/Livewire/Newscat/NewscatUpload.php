<?php

namespace Darvis\ModuleNews\Livewire\Newscat;

use Darvis\ModuleNews\Models\Newscat;
use Livewire\Component;


class NewscatUpload extends Component
{
    use NewscatTrait;

    public function mount(Newscat $newscat)
    {
        $this->item = $newscat;
        $this->itemOrg = $newscat;
        $this->id = $newscat->id;

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('upload', [
            'parents' =>
            [
                ['url' => route('news.list'), 'title' => module_config('News')['module_name']['multiple']]
            ]
        ]);
    }

    public function render()
    {
        return view('manta::default.manta-default-upload')->title('Servicescategorie bestanden');
    }
}
