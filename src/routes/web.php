<?php

use Darvis\ModuleNews\Livewire\News\NewsList;
use Darvis\ModuleNews\Livewire\News\NewsCreate;
use Darvis\ModuleNews\Livewire\News\NewsUpdate;
use Darvis\ModuleNews\Livewire\News\NewsRead;
use Darvis\ModuleNews\Livewire\News\NewsUpload;
use Darvis\ModuleNews\Livewire\Newscat\NewscatList;
use Darvis\ModuleNews\Livewire\Newscat\NewscatCreate;
use Darvis\ModuleNews\Livewire\Newscat\NewscatUpdate;
use Darvis\ModuleNews\Livewire\Newscat\NewscatRead;
use Darvis\ModuleNews\Livewire\Newscat\NewscatUpload;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'middleware' => ['auth:staff', 'web']], function () {

    $modules = collect(cms_config('manta')['modules']);

    $agendaModule = $modules->firstWhere("name", 'news');
    $name = isset($agendaModule['routename']) ? $agendaModule['routename'] : 'news';
    Route::get("/{$name}", NewsList::class)->name('news.list');
    Route::get("/{$name}/toevoegen", NewsCreate::class)->name('news.create');
    Route::get("/{$name}/aanpassen/{news}", NewsUpdate::class)->name('news.update');
    Route::get("/{$name}/lezen/{news}", NewsRead::class)->name('news.read');
    Route::get("/{$name}/bestanden/{news}", NewsUpload::class)->name('news.upload');

    Route::get("/{$name}/categorieen", NewscatList::class)->name('newscat.list');
    Route::get("/{$name}/categorieen/toevoegen", NewscatCreate::class)->name('newscat.create');
    Route::get("/{$name}/categorieen/aanpassen/{newscat}", NewscatUpdate::class)->name('newscat.update');
    Route::get("/{$name}/categorieen/lezen/{newscat}", NewscatRead::class)->name('newscat.read');
    Route::get("/{$name}/categorieen/bestanden/{newscat}", NewscatUpload::class)->name('newscat.upload');
});
