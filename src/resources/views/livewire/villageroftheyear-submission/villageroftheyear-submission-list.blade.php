<flux:main container>
    <x-manta.breadcrumb :$breadcrumb />
    <div class="mt-4 flex">
        <div class="flex-grow">
            <x-manta::buttons.large type="add" :href="route($this->route_name . '.create')" />
            <x-manta::buttons.large type="gear" :href="route($this->route_name . '.settings')" title="Instellingen" />
        </div>
        <div class="w-1/5">
            <x-manta.input.search />
        </div>
    </div>
    <x-manta.tables.tabs :$tablistShow :$trashed />
    <flux:table :paginate="$items">
        <flux:table.columns>
            <flux:table.column>
                <flux:icon.photo />
            </flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'created_at'" :direction="$sortDirection"
                wire:click="dosort('created_at')">Toegevoegd</flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'firstname'" :direction="$sortDirection"
                wire:click="dosort('firstname')">Voornaam</flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'lastname'" :direction="$sortDirection"
                wire:click="dosort('lastname')">Achternaam</flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($items as $item)
                <livewire:villageroftheyear-submission-row :$item :route_name="$this->route_name" :key="$item->id">
            @endforeach
        </flux:table.rows>
    </flux:table>
</flux:main>
