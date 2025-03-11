<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission;

use Flux\Flux;
use Darvis\ModuleVillageroftheyear\Models\VillageroftheyearSubmission;
use Darvis\Manta\Models\Option;
use Livewire\Component;
use Darvis\Manta\Traits\MantaTrait;

class VillageroftheyearSubmissionSettings extends Component
{
    use MantaTrait;
    use VillageroftheyearSubmissionTrait;

    public ?string $VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS = null;

    public function mount()
    {
        $VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS = Option::get('VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS', VillageroftheyearSubmission::class, app()->getLocale());
        if (empty($VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS)) {
            Option::set('VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS', json_encode(explode(PHP_EOL, env("MAIL_TO_ADDRESS"))), VillageroftheyearSubmission::class, app()->getLocale());
        }
        $VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS = Option::get('VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS', VillageroftheyearSubmission::class, app()->getLocale());
        if ($VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS) {
            $this->VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS = implode("\n", json_decode($VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS, true));
        }
        $this->getBreadcrumb();
    }

    public function render()
    {
        return view('module-villageroftheyear::livewire.villageroftheyear-submission.villageroftheyear-submission-settings')->title('Nieuwe leden instellingen');
    }

    public function save()
    {
        $this->validate([
            'VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS' => 'required',
        ], [
            'VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS.required' => 'De ontvangers zijn verplicht',
        ]);

        Option::set('VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS', json_encode(explode(PHP_EOL, $this->VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS)), VillageroftheyearSubmission::class, app()->getLocale());

        Flux::toast(
            'Instellingen opgeslagen',
            duration: 3000, // Show indefinitely...
        );
    }
}
