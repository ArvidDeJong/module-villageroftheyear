<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear;

use Flux\Flux;
use Darvis\ModuleVillageroftheyear\Models\Villageroftheyear;
use Darvis\Manta\Models\Option;
use Livewire\Component;
use Darvis\Manta\Traits\MantaTrait;

class VillageroftheyearSettings extends Component
{
    use MantaTrait;
    use VillageroftheyearTrait;

    public ?string $VILLAGEROFTHEYEAR_RECEIVERS = null;

    public function mount()
    {
        $VILLAGEROFTHEYEAR_RECEIVERS = Option::get('VILLAGEROFTHEYEAR_RECEIVERS', Villageroftheyear::class, app()->getLocale());
        if (empty($VILLAGEROFTHEYEAR_RECEIVERS)) {
            Option::set('VILLAGEROFTHEYEAR_RECEIVERS', json_encode(explode(PHP_EOL, env("MAIL_TO_ADDRESS"))), Villageroftheyear::class, app()->getLocale());
        }
        $VILLAGEROFTHEYEAR_RECEIVERS = Option::get('VILLAGEROFTHEYEAR_RECEIVERS', Villageroftheyear::class, app()->getLocale());
        if ($VILLAGEROFTHEYEAR_RECEIVERS) {
            $this->VILLAGEROFTHEYEAR_RECEIVERS = implode("\n", json_decode($VILLAGEROFTHEYEAR_RECEIVERS, true));
        }
        $this->getBreadcrumb();
    }

    public function render()
    {
        return view('module-villageroftheyear::livewire.villageroftheyear.villageroftheyear-settings')->title('Nieuwe leden instellingen');
    }

    public function save()
    {
        $this->validate([
            'VILLAGEROFTHEYEAR_RECEIVERS' => 'required',
        ], [
            'VILLAGEROFTHEYEAR_RECEIVERS.required' => 'De ontvangers zijn verplicht',
        ]);

        Option::set('VILLAGEROFTHEYEAR_RECEIVERS', json_encode(explode(PHP_EOL, $this->VILLAGEROFTHEYEAR_RECEIVERS)), Villageroftheyear::class, app()->getLocale());

        Flux::toast(
            'Instellingen opgeslagen',
            duration: 3000, // Show indefinitely...
        );
    }
}
