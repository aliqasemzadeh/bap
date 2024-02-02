<x-slot name="title">
    {{ __('bap.dashboard') }}
</x-slot>

<main class="{{ config('bap.container', 'container-fluid') }}">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {{ __('bap.dashboard') }}
                </h2>
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('panel.dashboard.index') }}">{{ __('bap.dashboard') }}</a></li>
                </ol>
            </div>
        </div>
    </div>
</main>
