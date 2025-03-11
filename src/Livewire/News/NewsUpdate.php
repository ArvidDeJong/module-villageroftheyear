<?php

namespace Darvis\ModuleNews\Livewire\News;

use Flux\Flux;
use Darvis\ModuleNews\Models\News;
use Darvis\ModuleNews\Models\Newscatjoin;

use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Livewire\Component;

class NewsUpdate extends Component
{
    use MantaTrait;
    use NewsTrait;

    public function mount(News $news)
    {
        $this->item = $news;
        $this->itemOrg = translate($news, 'nl')['org'];
        $this->id = $news->id;
        $this->locale = $news->locale;

        $this->fill(
            $news->only(
                'company_id',
                'pid',
                'locale',
                'author',
                'title',
                'title_2',
                'title_3',
                'slug',
                'seo_title',
                'seo_description',
                'tags',
                'summary',
                'excerpt',
                'content',
            ),
        );

        $this->fields['newscat']['options'] = $this->getNewscats();

        foreach (Newscatjoin::where('news_id', $this->id)->get() as $key => $value) {
            $this->newscat[$value->id] = true;
        }

        $this->getLocaleInfo();
        $this->getBreadcrumb('update');
        $this->getTablist();
    }

    public function render()
    {
        return view('manta::default.manta-default-update')->title($this->config['module_name']['single'] . ' aanpassen');
    }

    public function save()
    {
        $this->validate();

        $row = $this->only(
            'company_id',
            'pid',
            'locale',
            'author',
            'title',
            'title_2',
            'title_3',
            'slug',
            'seo_title',
            'seo_description',
            'tags',
            'summary',
            'excerpt',
            'content',
        );
        $row['updated_by'] = auth('staff')->user()->name;
        News::where('id', $this->id)->update($row);

        $ids = [];
        foreach ($this->newscat as $key => $value) {
            $item = Newscatjoin::where(['news_id' => $this->id, 'newscat_id' => $key])->first();
            $ids[] = $key;
            if (!$item) {
                Newscatjoin::create(['news_id' => $this->id, 'newscat_id' => $key]);
            }
        }
        Newscatjoin::where('news_id', $this->id)->whereNotIn('id', $ids)->delete();

        Flux::toast('Opgeslagen', duration: 1000, variant: 'success');
    }
}
