<div id="laravel-livewire-modals" tabindex="-1"
    data-bs-backdrop="static" data-bs-keyboard="false"
    wire:ignore.self class="modal fade">

    @if($alias)
        @livewire($alias, $params, key($alias))
    @endif

</div>
