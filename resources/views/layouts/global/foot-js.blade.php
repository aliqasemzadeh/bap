@stack('modals')

<livewire:modals />
@livewireScripts
@livewireChartsScripts
<x-livewire-alert::scripts />
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

@stack('scripts')
