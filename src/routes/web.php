<?php

use Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionList;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'cms', 'middleware' => ['auth:staff', 'web']], function () {

    $modules = collect(cms_config('manta')['modules']);

    $agendaModule = $modules->firstWhere("name", 'becomeamember');
    $name = isset($agendaModule['routename']) ? $agendaModule['routename'] : 'becomeamember';

    $moduleConfig = $modules->firstWhere("name", 'villageroftheyear');
    $name = isset($moduleConfig['routename']) ? $moduleConfig['routename'] : 'villageroftheyear';
    Route::get("/{$name}", \Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearList::class)->name('villageroftheyear.list');
    Route::get("/{$name}/toevoegen", \Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearCreate::class)->name('villageroftheyear.create');
    Route::get("/{$name}/aanpassen/{villageroftheyear}", \Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearUpdate::class)->name('villageroftheyear.update');
    Route::get("/{$name}/lezen/{villageroftheyear}", \Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearRead::class)->name('villageroftheyear.read');
    Route::get("/{$name}/bestanden/{villageroftheyear}", \Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearUpload::class)->name('villageroftheyear.upload');
    Route::get("/{$name}/instellingen", \Darvis\ModuleVillageroftheyear\Livewire\Villageroftheyear\VillageroftheyearSettings::class)->name('villageroftheyear.settings');

    $moduleConfig = $modules->firstWhere("name", 'villageroftheyearSubmission');
    $name = isset($moduleConfig['routename']) ? $moduleConfig['routename'] : 'villageroftheyearSubmission';
    Route::get("/{$name}", VillageroftheyearSubmissionList::class)->name('villageroftheyearSubmission.list');
    Route::get("/{$name}/toevoegen", \Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionCreate::class)->name('villageroftheyearSubmission.create');
    Route::get("/{$name}/aanpassen/{villageroftheyearSubmission}", \Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionUpdate::class)->name('villageroftheyearSubmission.update');
    Route::get("/{$name}/lezen/{villageroftheyearSubmission}", \Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionRead::class)->name('villageroftheyearSubmission.read');
    Route::get("/{$name}/bestanden/{villageroftheyearSubmission}", \Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionUpload::class)->name('villageroftheyearSubmission.upload');
    Route::get("/{$name}/instellingen", \Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission\VillageroftheyearSubmissionSettings::class)->name('villageroftheyearSubmission.settings');
});
