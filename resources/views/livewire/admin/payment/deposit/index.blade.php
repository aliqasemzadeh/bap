<div>
    <x-slot name="title">
        {{ __('bap.deposits') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('bap.dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.payment.depsoit.index') }}">{{ __('bap.deposits') }}</a></li>
        </ol>
    </x-slot>
</div>
