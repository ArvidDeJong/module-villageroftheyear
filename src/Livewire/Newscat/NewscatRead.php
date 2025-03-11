<?php

namespace Darvis\ModuleNews\Livewire\Newscat;

use Darvis\ModuleNews\Models\Newscat;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Livewire\Component;

class NewscatRead extends Component
{
    use MantaTrait;
    use NewscatTrait;

    public function mount(Request $request, Newscat $newscat)
    {
        $this->item = $newscat;
        $this->itemOrg = $newscat;
        $this->locale = $newscat->locale;
        if ($request->input('locale') && $request->input('locale') != getLocaleManta()) {
            $this->pid = $newscat->id;
            $this->locale = $request->input('locale');
            $newscat_translate = Newscat::where(['pid' => $newscat->id, 'locale' => $request->input('locale')])->first();
            $this->item = $newscat_translate;
        }

        if ($newscat) {
            $this->id = $newscat->id;
        }
        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('read', [
            'parents' =>
            [
                ['url' => route('news.list'), 'title' => module_config('News')['module_name']['multiple']]
            ]
        ]);
    }

    public function render()
    {
        return view('manta::default.manta-default-read')->title('Services categorie bekijken');
    }
}
