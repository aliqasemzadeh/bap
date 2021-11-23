<div>
    <x-slot name="title">
        {{ $ticket->title }}
    </x-slot>
    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('panel.dashboard.index') }}">{{ __('bap.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('panel.support.ticket.index') }}">{{ __('bap.tickets') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('panel.support.ticket.view', [$ticket->id]) }}">{{ $ticket->title }}</a></li>
        </ol>
    </x-slot>

    <div class="row row-cards">
        <div class="col-12">
            <form wire:submit.prevent="replay" class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('bap.replay') }}</h4>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label" for="description">{{ __('bap.body') }}</label>
                        <textarea wire:model="body" class="form-control @error('body') is-invalid @enderror" name="body"></textarea>
                        @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-label">{{ __('bap.files') }}</div>
                        <input type="file" multiple wire:model="files" class="form-control @error('files') is-invalid @enderror" name="files">
                        @error('files')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary ms-auto">{{ __('bap.submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @foreach($replays as $replay)
    <div class="row row-cards mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        {{ $replay->user->name }}
                    </h4>
                    <span>{{ $replay->created_at }}</span>
                </div>
                <div class="card-body">
                    {{ $replay->body }}
                </div>
                @if($replay->files->count() > 0)
                <div class="card-footer">
                    <div class="list-group">
                        @foreach($replay->files as $file)
                        <a href="#downloadFile" wire:click="downloadFile({{ $file }})" class="list-group-item list-group-item-action">{{ $file->title }}</a>
                        @endforeach
                    </div>
                </div>
                    @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
