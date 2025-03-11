<?php

namespace Darvis\ModuleNews\Livewire\News;

use Darvis\ModuleNews\Models\News;
use Darvis\Manta\Traits\MantaPagerowTrait;

new class extends \Livewire\Volt\Component {
    public News $item;

    use MantaPagerowTrait;
};
?>
<flux:table.row data-id="{{ $item->id }}">
    @if ($this->fields['uploads']['active'])
        <flux:table.cell><x-manta.tables.image :item="$item->image" /></flux:table.cell>
    @endif
    <flux:table.cell>{{ $item->title }}</flux:table.cell>
    @if ($this->fields['slug']['active'])
        <flux:table.cell>
            @if ($item->slug && Route::has('website.news-item'))
                <a href="{{ route('website.news-item', ['slug' => $item->slug]) }}"
                    class="text-blue-500 hover:text-blue-800">
                    {{ $item->slug }}
                </a>
            @endif
        </flux:table.cell>
    @endif
    @if ($this->fields['author']['active'])
        <flux:table.cell>{{ $item->author }}</flux:table.cell>
    @endif
    @if ($this->fields['uploads']['active'])
        <flux:table.cell>{{ count($item->categories) > 0 ? count($item->categories) : null }}</flux:table.cell>
        <flux:table.cell>{{ count($item->images) > 0 ? count($item->images) : null }}</flux:table.cell>
    @endif
    <x-manta::flux.manta-flux-delete :$item :$route_name :$moduleClass uploads :$fields />
</flux:table.row>
