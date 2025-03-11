<?php

namespace Darvis\ModuleNews\Livewire\Newscat;

use Flux\Flux;
use Darvis\ModuleNews\Models\Newscat;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Livewire\Component;


class NewscatUpdate extends Component
{
    use MantaTrait;
    use NewscatTrait;

    public function mount(Request $request, Newscat $newscat)
    {
        $this->item = $newscat;
        $this->itemOrg = $newscat;
        $this->id = $newscat->id;

        $this->fill(
            $newscat->only(
                'company_id',
                'pid',
                'locale',
                'title',
                'title_2',
                'slug',
                'seo_title',
                'seo_description',
                'tags',
                'summary',
                'excerpt',
                'content',
            ),
        );

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('update', [
            'parents' =>
            [
                ['url' => route('news.list'), 'title' => module_config('News')['module_name']['multiple']]
            ]
        ]);
    }

    public function render()
    {
        return view('manta::default.manta-default-update')->title('Servicescategorie aanpassen');
    }



    public function save()
    {
        $this->validate();

        $row = $this->only(
            'company_id',
            'pid',
            'locale',
            'title',
            'title_2',
            'slug',
            'seo_title',
            'seo_description',
            'tags',
            'summary',
            'excerpt',
            'content',
        );
        $row['updated_by'] = auth('staff')->user()->name;
        Newscat::where('id', $this->id)->update($row);

        // return redirect()->to(route('newscat.list'));
        Flux::toast('Opgeslagen', duration: 1000, variant: 'success');
    }
}
