<div>
   <x-slot name="title">
       {{ __('bap.users') }}
   </x-slot>
    <x-slot name="actions">
        @can('admin_user_create')
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <button onclick="Livewire.emit('showModal', 'admin.user.create')" class="btn btn-primary d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    {{ __('bap.create_user') }}
                </button>
                <button onclick="Livewire.emit('showModal', 'admin.user.create')" class="btn btn-primary d-sm-none btn-icon" aria-label="Create new report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </button>
            </div>
        </div>
        @endcan
   </x-slot>
    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('bap.dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.user.index') }}">{{ __('bap.users') }}</a></li>
        </ol>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('bap.users') }}</h3>
        </div>
        <div class="card-body">
            <div class="d-flex">
                <div class="text-muted">
                    {{ __('bap.per_page') }}:
                    <div class="mx-2 d-inline-block">
                        <div class="btn-group btn-group-sm w-100">
                            <button type="button" wire:click="setPerPage(10)" class="btn @if($perPage == 10) btn-primary @endif">10</button>
                            <button type="button" wire:click="setPerPage(15)" class="btn @if($perPage == 15) btn-primary @endif">15</button>
                            <button type="button" wire:click="setPerPage(20)" class="btn @if($perPage == 20) btn-primary @endif">20</button>
                            <button type="button" wire:click="setPerPage(25)" class="btn @if($perPage == 25) btn-primary @endif">25</button>
                        </div>
                    </div>
                </div>
                <div class="ms-auto text-muted">
                    {{ __('bap.search') }}:
                    <div class="ms-2 d-inline-block">

                        <div class="input-group input-group-sm input-group-flat">
                            <input type="text"  wire:model="search" class="form-control" autocomplete="off">
                            @if($search)
                            <span class="input-group-text">
                                <a href="#clear" wire:click="clear" class="link-secondary" title="" data-bs-toggle="tooltip" data-bs-original-title="Clear search"><!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </a>
                              </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                <tr>
                    <th class="w-1"><input name="selectAll" wire:model="selectAll" class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                    <th class="w-1" wire:click="sortByColumn('id')">{{ __('bap.number') }}

                    @if ($sortColumn == 'id')
                        @if($sortDirection == 'asc')
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 15 12 9 18 15" /></svg>
                        @else
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-down -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 9 12 15 18 9" /></svg>

                            @endif
                        @endif
                    </th>
                    <th wire:click="sortByColumn('email')">{{ __('bap.email') }}

                        @if ($sortColumn == 'email')
                            @if($sortDirection == 'asc')
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 15 12 9 18 15" /></svg>
                             @else
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-down -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 9 12 15 18 9" /></svg>

                                @endif
                        @endif
                    </th>
                    <th wire:click="sortByColumn('created_at')">{{ __('bap.created_at') }}

                    @if ($sortColumn == 'created_at')
                        @if($sortDirection == 'asc')
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 15 12 9 18 15" /></svg>
                        @else
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-down -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 9 12 15 18 9" /></svg>

                            @endif
                        @endif
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select User" value="{{ $user->id }}" name="selectedUsers" wire:model="selectedUsers"></td>
                    <td>{{ $user->id }}</td>
                    <td>
                        <div class="d-flex py-1 align-items-center">
                            <span class="avatar me-2" style="background-image: url({{ $user->gravatar }})"></span>
                            <div class="flex-fill">
                                <div class="font-weight-medium">{{ $user->name }}</div>
                                <div class="text-muted">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-end">
                            @can('admin_user_roles')
                            <button onclick="Livewire.emit('showModal', 'admin.user.roles', '{{ json_encode($user->id) }}')" class="btn btn-secondary btn-icon btn-sm">
                                <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                            </button>
                            @endcan
                            @can('admin_user_permissions')
                            <button onclick="Livewire.emit('showModal', 'admin.user.permissions', '{{ json_encode($user->id) }}')" class="btn btn-warning btn-icon btn-sm">
                                <!-- Download SVG icon from http://tabler-icons.io/i/lock-access -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8v-2a2 2 0 0 1 2 -2h2" /><path d="M4 16v2a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v2" /><path d="M16 20h2a2 2 0 0 0 2 -2v-2" /><rect x="8" y="11" width="8" height="5" rx="1" /><path d="M10 11v-2a2 2 0 1 1 4 0v2" /></svg>
                            </button>
                            @endcan
                            @can('admin_user_edit')
                            <button onclick="Livewire.emit('showModal', 'admin.user.edit', '{{ json_encode($user->id) }}')" class="btn btn-primary btn-icon btn-sm">
                                <!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                            </button>
                            @endcan
                            @can('admin_user_delete')
                            <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-icon btn-sm">
                                <!-- Download SVG icon from http://tabler-icons.io/i/trash -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </button>
                            @endcan
                                @can('admin_user_ban')
                                    <button onclick="Livewire.emit('showModal', 'admin.user.ban', '{{ json_encode($user->id) }}')" class="btn btn-danger btn-icon btn-sm">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ban" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <desc>Download more icon variants from https://tabler-icons.io/i/ban</desc>
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="5.7" y1="5.7" x2="18.3" y2="18.3"></line>
                                        </svg>
                                    </button>
                                @endcan
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <div>
                <div class="btn-group btn-group-sm w-100">
                    <button type="button" wire:click="deleteSelected" class="btn">{{ __('bap.delete') }} ({{ count($selectedUsers) }})</button>
                    <button type="button" wire:click="exportSelectedQuery" class="btn">{{ __('bap.export') }} ({{ count($selectedUsers) }})</button>
                </div>

            </div>

            <div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
