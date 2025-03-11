<?php

namespace Darvis\ModuleNews;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Livewire\Livewire;
use Darvis\ModuleNews\Livewire\News\NewsCreate;
use Darvis\ModuleNews\Livewire\News\NewsList;
use Darvis\ModuleNews\Livewire\News\NewsRead;
use Darvis\ModuleNews\Livewire\News\NewsUpdate;
use Darvis\ModuleNews\Livewire\News\NewsUpload;
use Darvis\ModuleNews\Livewire\Newscat\NewscatCreate;
use Darvis\ModuleNews\Livewire\Newscat\NewscatList;
use Darvis\ModuleNews\Livewire\Newscat\NewscatRead;
use Darvis\ModuleNews\Livewire\Newscat\NewscatUpdate;
use Darvis\ModuleNews\Livewire\Newscat\NewscatUpload;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/module_news.php',
            'module_news'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'module-news');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/config/module_news.php' => config_path('module_news.php'),
            ], 'module-news-config');

            $this->publishes([
                __DIR__ . '/resources/views' => resource_path('views/vendor/module-news'),
            ], 'module-news-views');
        }

        // Register Livewire Components
        Livewire::component('news-create', NewsCreate::class);
        Livewire::component('news-list', NewsList::class);
        Livewire::component('news-read', NewsRead::class);
        Livewire::component('news-update', NewsUpdate::class);
        Livewire::component('news-upload', NewsUpload::class);

        Livewire::component('newscat-create', NewscatCreate::class);
        Livewire::component('newscat-list', NewscatList::class);
        Livewire::component('newscat-read', NewscatRead::class);
        Livewire::component('newscat-update', NewscatUpdate::class);
        Livewire::component('newscat-upload', NewscatUpload::class);
    }
}
