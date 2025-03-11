<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission;

use Darvis\ModuleVillageroftheyear\Mail\MailCultureleVillageroftheyear;
use Darvis\ModuleVillageroftheyear\Models\VillageroftheyearSubmission;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Darvis\Manta\Models\Option;

class VillageroftheyearSubmissionButtonEmail extends Component
{
    public ?VillageroftheyearSubmission $item = null;

    public bool $send = false;

    public function render()
    {
        return view('module-villageroftheyear::livewire.villageroftheyear-submission.villageroftheyear-submission-button-email');
    }

    public function save()
    {
        $this->send = false;

        $VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS = Option::get('VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS', VillageroftheyearSubmission::class, app()->getLocale());

        // Decode the JSON string to an array
        $receiversArray = json_decode($VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $receiversArray[] = env('MAIL_TO_ADDRESS');
            // Handle JSON decode error
            // throw new \Exception('Error decoding VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS JSON: ' . json_last_error_msg());
        }

        // Ensure $receiversArray is an array
        if (!is_array($receiversArray)) {
            $receiversArray[] = env('MAIL_TO_ADDRESS');
            // throw new \Exception('VILLAGEROFTHEYEAR_SUBMISSION_RECEIVERS must be a JSON array.');
        }
        // Process each receiver
        foreach ($receiversArray as $receiver) {
            if ($receiver == "##ZENDER##" && filter_var($this->item->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($this->item->email)->send(new MailCultureleVillageroftheyear($this->item));
            } else if (filter_var($receiver, FILTER_VALIDATE_EMAIL)) {
                Mail::to($receiver)->send(new MailCultureleVillageroftheyear($this->item));
            }
        }
    }
}
