<?php

namespace Darvis\ModuleVillageroftheyear;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearList;
use Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearCreate;
use Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearUpdate;
use Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearRead;
use Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearSettings;
use Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearUpload;
use Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearRow;
use Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionList;
use Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionCreate;
use Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionUpdate;
use Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionRead;
use Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionSettings;
use Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionButtonEmail;
use Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionUpload;
use Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionRow;

class VillageroftheyearServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'module-villageroftheyear');

        // Publish configuration
        $this->publishes([
            __DIR__.'/config/module_villageroftheyear.php' => config_path('module_villageroftheyear.php'),
            __DIR__.'/config/module_villageroftheyear-submission.php' => config_path('module_villageroftheyear-submission.php'),
        ], 'config');

        // Register Villageroftheyear components
        Livewire::component('villageroftheyear-list', VillageroftheyearList::class);
        Livewire::component('villageroftheyear-create', VillageroftheyearCreate::class);
        Livewire::component('villageroftheyear-update', VillageroftheyearUpdate::class);
        Livewire::component('villageroftheyear-read', VillageroftheyearRead::class);
        Livewire::component('villageroftheyear-settings', VillageroftheyearSettings::class);
        Livewire::component('villageroftheyear-upload', VillageroftheyearUpload::class);
        Livewire::component('villageroftheyear-row', VillageroftheyearRow::class);

        // Register VillageroftheyearSubmission components
        Livewire::component('villageroftheyear-submission-list', VillageroftheyearSubmissionList::class);
        Livewire::component('villageroftheyear-submission-create', VillageroftheyearSubmissionCreate::class);
        Livewire::component('villageroftheyear-submission-update', VillageroftheyearSubmissionUpdate::class);
        Livewire::component('villageroftheyear-submission-read', VillageroftheyearSubmissionRead::class);
        Livewire::component('villageroftheyear-submission-settings', VillageroftheyearSubmissionSettings::class);
        Livewire::component('villageroftheyear-submission-button-email', VillageroftheyearSubmissionButtonEmail::class);
        Livewire::component('villageroftheyear-submission-upload', VillageroftheyearSubmissionUpload::class);
        Livewire::component('villageroftheyear-submission-row', VillageroftheyearSubmissionRow::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/module_villageroftheyear.php', 'module_villageroftheyear'
        );

        $this->mergeConfigFrom(
            __DIR__.'/config/module_villageroftheyear-submission.php', 'module_villageroftheyear-submission'
        );
    }
}
