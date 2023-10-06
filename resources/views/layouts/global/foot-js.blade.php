
<livewire:modals />
@livewireScripts
<x-livewire-alert::scripts />
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


<script>
    document.addEventListener('livewire:initialized', () => {
            alert('showModal');
    });
</script>


@stack('scripts')
