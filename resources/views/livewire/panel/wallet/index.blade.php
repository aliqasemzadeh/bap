<div>
    <x-slot name="title">
        {{ __('bap.wallet') }}
    </x-slot>
    <x-slot name="actions">
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="{{ route('panel.user.wallet.index')  }}"
                        class="btn btn-primary d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler d-lg-inline-block" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"></path>
                        <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
                    </svg>
                    {{ __('bap.wallets') }}
                </a>
                <a href="{{ route('panel.user.wallet.index')  }}"
                        class="btn btn-primary d-sm-none btn-icon" aria-label="{{ __('bap.wallets') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler d-lg-inline-block" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"></path>
                        <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
                    </svg>
                </a>
                <button wire:click="$dispatch('showModal', 'panel.wallet.deposit')"
                        class="btn btn-success d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                        <path d="M7 11l5 5l5 -5"></path>
                        <path d="M12 4l0 12"></path>
                    </svg>
                    {{ __('bap.deposit') }}
                </button>
                <button wire:click="$dispatch('showModal', 'panel.wallet.deposit')"
                        class="btn btn-success d-sm-none btn-icon" aria-label="{{ __('bap.deposit') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                        <path d="M7 11l5 5l5 -5"></path>
                        <path d="M12 4l0 12"></path>
                    </svg>
                </button>
                <button wire:click="$dispatch('showModal', 'panel.wallet.withdraw')"
                        class="btn btn-danger d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                        <path d="M7 9l5 -5l5 5"></path>
                        <path d="M12 4l0 12"></path>
                    </svg>
                    {{ __('bap.withdraw') }}
                </button>
                <button wire:click="$dispatch('showModal', 'panel.wallet.withdraw')"
                        class="btn btn-danger d-sm-none btn-icon" aria-label="{{ __('bap.withdraw') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                        <path d="M7 9l5 -5l5 5"></path>
                        <path d="M12 4l0 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </x-slot>
    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('panel.dashboard.index') }}">{{ __('bap.dashboard') }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('panel.wallet.index') }}">{{ __('bap.wallet') }}</a></li>
        </ol>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('bap.wallet') }}</h3>
        </div>
        <div class="card-body">
            <div class="d-flex">
                <div class="ms-auto text-muted">
                    {{ __('bap.search') }}:
                    <div class="ms-2 d-inline-block">

                        <div class="input-group input-group-sm input-group-flat">
                            <input type="text" wire:model="search" class="form-control" autocomplete="off">
                            @if($search)
                                <span class="input-group-text">
                                <a href="#clear" wire:click="clear" class="link-secondary" title=""
                                   data-bs-toggle="tooltip" data-bs-original-title="Clear search"><!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16"
                                       viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                       stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                                                                                            d="M0 0h24v24H0z"
                                                                                            fill="none"></path><line
                                          x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18"
                                                                                     y2="18"></line></svg>
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
                    <th class="w-1" wire:click="sortByColumn('id')">{{ __('bap.number') }}

                        @if ($sortColumn == 'id')
                            @if($sortDirection == 'asc')
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="6 15 12 9 18 15"/>
                                </svg>
                            @else
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-down -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>

                            @endif
                        @endif
                    </th>
                    <th wire:click="sortByColumn('symbol')">{{ __('bap.symbol') }}

                        @if ($sortColumn == 'symbol')
                            @if($sortDirection == 'asc')
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="6 15 12 9 18 15"/>
                                </svg>
                            @else
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-down -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>

                            @endif
                        @endif
                    </th>
                    <th wire:click="sortByColumn('balance')">{{ __('bap.balance') }}

                        @if ($sortColumn == 'balance')
                            @if($sortDirection == 'asc')
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="6 15 12 9 18 15"/>
                                </svg>
                            @else
                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-down -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>

                            @endif
                        @endif
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($wallets as $wallet)
                    <tr>
                        <td>{{ $wallet->id }}</td>
                        <td>
                            <div class="d-flex py-1 align-items-center">
                                @if($wallet->symbol != 'PLQ')
                                <span class="avatar me-2"
                                      style="background-image: url({{ asset('cryptocurrency-icons/'.$wallet->symbol.'.svg') }})"></span>
                                @else
                                    <span class="avatar me-2"
                                          style="background-image: url({{ asset('cryptocurrency-icons/'.$wallet->symbol.'.png') }})"></span>
                                    @endif
                                <div class="flex-fill">
                                    <div class="font-weight-medium">{{ __('wallet.'.$wallet->symbol .'.title') }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $wallet->balance }}</td>
                        <td class="text-end">
                            <button wire:click="$dispatch('showModal', 'panel.wallet.deposit')"
                                    class="btn btn-sm btn-success d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                    <path d="M7 11l5 5l5 -5"></path>
                                    <path d="M12 4l0 12"></path>
                                </svg>
                                {{ __('bap.deposit') }}
                            </button>
                            <button wire:click="$dispatch('showModal', 'panel.wallet.deposit')"
                                    class="btn btn-sm btn-success d-sm-none btn-icon"
                                    aria-label="{{ __('bap.deposit') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                    <path d="M7 11l5 5l5 -5"></path>
                                    <path d="M12 4l0 12"></path>
                                </svg>
                            </button>
                            <button wire:click="$dispatch('showModal', 'panel.wallet.withdraw')"
                                    class="btn btn-sm btn-danger d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                    <path d="M7 9l5 -5l5 5"></path>
                                    <path d="M12 4l0 12"></path>
                                </svg>
                                {{ __('bap.withdraw') }}
                            </button>
                            <button wire:click="$dispatch('showModal', 'panel.wallet.withdraw')"
                                    class="btn btn-sm btn-danger d-sm-none btn-icon"
                                    aria-label="{{ __('bap.withdraw') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                    <path d="M7 9l5 -5l5 5"></path>
                                    <path d="M12 4l0 12"></path>
                                </svg>
                            </button>

                            <button wire:click="$dispatch('showModal', 'panel.wallet.trade')"
                                    class="btn btn-sm btn-purple d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon icon-tabler icon-tabler-arrows-exchange-2" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17 10h-14l4 -4"></path>
                                    <path d="M7 14h14l-4 4"></path>
                                </svg>
                                {{ __('bap.trade') }}
                            </button>
                            <button wire:click="$dispatch('showModal', 'panel.wallet.trade')"
                                    class="btn btn-sm btn-purple d-sm-none btn-icon" aria-label="{{ __('bap.trade') }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon icon-tabler icon-tabler-arrows-exchange-2" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17 10h-14l4 -4"></path>
                                    <path d="M7 14h14l-4 4"></path>
                                </svg>
                            </button>


                            @if(config('wallet.'.$wallet->symbol.'.stack'))
                                <button wire:click="$dispatch('showModal', 'panel.wallet.stack')"
                                        class="btn btn-sm btn-primary d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-brand-stackoverflow" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 17v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M8 16h8"></path>
                                        <path d="M8.322 12.582l7.956 .836"></path>
                                        <path d="M8.787 9.168l7.826 1.664"></path>
                                        <path d="M10.096 5.764l7.608 2.472"></path>
                                    </svg>
                                    {{ __('bap.stack') }}
                                </button>
                                <button wire:click="$dispatch('showModal', 'panel.wallet.stack')"
                                        class="btn btn-sm btn-primary d-sm-none btn-icon"
                                        aria-label="{{ __('bap.stack') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-brand-stackoverflow" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 17v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M8 16h8"></path>
                                        <path d="M8.322 12.582l7.956 .836"></path>
                                        <path d="M8.787 9.168l7.826 1.664"></path>
                                        <path d="M10.096 5.764l7.608 2.472"></path>
                                    </svg>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <div>

            </div>

            <div>
            </div>
        </div>
    </div>
</div>
