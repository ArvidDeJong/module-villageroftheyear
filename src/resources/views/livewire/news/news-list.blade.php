<flux:main container>
    <x-manta.breadcrumb :$breadcrumb />
    <div class="mt-4 flex">
        <div class="flex-grow">
            <x-manta::buttons.large type="add" :href="route($this->route_name . '.create')" />

            @if (isset($fields['newscat']) && $fields['newscat']['active'])
                <x-manta::buttons.large type="list" :href="route('newscat.list')"
                    title="{{ $config['module_name']['single'] }} categorieën" />
            @endif
        </div>
        <div class="w-1/5">
            <x-manta.input.search />
        </div>
    </div>
    <x-manta.tables.tabs :$tablistShow :$trashed />
    <flux:table :paginate="$items">
        <flux:table.columns>
            @if ($this->fields['uploads']['active'])
                <flux:table.column></flux:table.column>
            @endif
            <flux:table.column sortable :sorted="$sortBy === 'title'" :direction="$sortDirection"
                wire:click="dosort('title')">
                Titel</flux:table.column>
            @if ($this->fields['slug']['active'])
                <flux:table.column sortable :sorted="$sortBy === 'slug'" :direction="$sortDirection"
                    wire:click="dosort('slug')">Slug
                </flux:table.column>
            @endif
            @if ($this->fields['author']['active'])
                <flux:table.column sortable :sorted="$sortBy === 'author'" :direction="$sortDirection"
                    wire:click="dosort('author')">
                    Auteur</flux:table.column>
            @endif
            @if ($this->fields['uploads']['active'])
                <flux:table.column><i class="fa-solid fa-list"></i></flux:table.column>
                <flux:table.column><i class="fa-solid fa-images"></i></flux:table.column>
            @endif

        </flux:table.columns>
        <flux:table.rows>
            @foreach ($items as $item)
                <livewire:module-news::news.news-list-row :fields="$fields" :item="$item" :route_name="$this->route_name" :moduleClass="$moduleClass"
                    :key="$item->id" />
            @endforeach
        </flux:table.rows>
    </flux:table>
</flux:main>
