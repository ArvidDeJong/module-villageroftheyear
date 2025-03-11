<flux:table.row data-id="{{ $item->id }}">
    <flux:table.cell><x-manta.tables.image :item="$item->image" /></flux:table.cell>
    <flux:table.cell>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</flux:table.cell>
    <flux:table.cell>{{ $item->firstname }}</flux:table.cell>
    <flux:table.cell>{{ $item->lastname }}</flux:table.cell>
    <flux:table.cell>
        <livewire:villageroftheyear-submission-button-email :item="$item" />
    </flux:table.cell>
    <x-manta::flux.manta-flux-delete :$item :$route_name :$moduleClass uploads :$fields />
</flux:table.row>
