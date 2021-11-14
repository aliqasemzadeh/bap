<div id="laravel-livewire-modals" tabindex="-1"
    wire:ignore.self class="modal fade">

    @if($alias)
        @livewire($alias, $params, key($alias))
    @endif

</div>
