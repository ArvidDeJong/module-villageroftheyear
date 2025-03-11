<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission;

use Flux\Flux;
use Livewire\Component;
use Darvis\ModuleVillageroftheyear\Models\VillageroftheyearSubmission;
use Illuminate\Http\Request;
use Darvis\Manta\Traits\MantaTrait;

class VillageroftheyearSubmissionUpdate extends Component
{
    use MantaTrait;
    use VillageroftheyearSubmissionTrait;

    public function mount(Request $request, VillageroftheyearSubmission $villageroftheyearSubmission)
    {
        $this->item = $villageroftheyearSubmission;
        $this->itemOrg = translate($villageroftheyearSubmission, 'nl')['org'];
        $this->id = $villageroftheyearSubmission->id;

        $this->fill(
            $villageroftheyearSubmission->only(
                'locale',
                'company',
                'title',
                'sex',
                'firstname',
                'lastname',
                'email',
                'phone',
                'address',
                'zipcode',
                'city',
                'country',
                'birthdate',
                'newsletters',
                'subject',
                'comment',
            ),
        );
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
            'locale',
            'company',
            'title',
            'sex',
            'firstname',
            'lastname',
            'email',
            'phone',
            'address',
            'zipcode',
            'city',
            'country',
            'birthdate',
            'newsletters',
            'subject',
            'comment',
        );
        $row['updated_by'] = auth('staff')->user()->name;
        VillageroftheyearSubmission::where('id', $this->id)->update($row);

        // return redirect()->to(route($this->route_name . '.list'));
        Flux::toast('Opgeslagen', duration: 1000, variant: 'success');
    }
}
