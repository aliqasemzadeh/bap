<div>
    <x-slot name="title">
        {{ $ticket->title }}
    </x-slot>
    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('panel.dashboard.index') }}">{{ __('bap.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.support.ticket.index') }}">{{ __('bap.tickets') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('panel.support.ticket.view', [$ticket->id]) }}">{{ $ticket->title }}</a></li>
        </ol>
    </x-slot>

    @if($ticket->status == 'done' || $ticket->status == 'close' || $ticket->status == 'closed')
        <div class="alert alert-important alert-info alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
                </div>
                <div>
                    {{ __('bap.please_create_new_ticket') }}
                </div>
            </div>
            <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @else
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
                        <button type="submit" wire:model="next_action" value="index" class="btn btn-secondary">{{ __('bap.submit') }}</button>
                        <button type="submit" name="next_action" wire:model="next_action" value="next" class="btn btn-primary ms-auto">{{ __('bap.next_submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif

    @foreach($replays as $replay)
        <div class="row row-cards mt-1">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">
                            {{ $replay->user->name }} -  {{ $replay->user->email }}
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
