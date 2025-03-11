<flux:table.row data-id="{{ $item->id }}">
    <flux:table.cell class="flex items-center gap-3">
        <x-manta.tables.image :item="$item->image" />
    </flux:table.cell>
    <flux:table.cell>{{ $item->year }}</flux:table.cell>
    <flux:table.cell>{{ $item->title }}</flux:table.cell>
    <x-manta::flux.manta-flux-delete :$item :$route_name :$moduleClass uploads :$fields />
</flux:table.row>
