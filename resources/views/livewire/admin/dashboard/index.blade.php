<div>
    <x-slot name="title">
        {{ __('bap.dashboard') }}
    </x-slot>
    <x-slot name="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.dashboard.index') }}">{{ __('bap.dashboard') }}</a></li>
        </ol>
    </x-slot>
    <div class="row row-cards">
        <div class="col-md-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-blue text-white avatar">

	                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="15" y1="5" x2="15" y2="7" /><line x1="15" y1="11" x2="15" y2="13" /><line x1="15" y1="17" x2="15" y2="19" /><path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" /></svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ \App\Models\Ticket::count() }} {{ __('bap.tickets') }}
                            </div>
                            <div class="text-muted">
                                {{ \App\Models\Ticket::whereIn('status', ['new', 'customer'])->count() }} {{ __('bap.unanswered_ticket') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                78 Orders
                            </div>
                            <div class="text-muted">
                                32 shipped
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-purple text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/users -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="9" cy="7" r="4"></circle><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path><path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path></svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ \App\Models\User::count() }} {{ __('bap.users') }}
                            </div>
                            <div class="text-muted">
                                {{ \App\Models\User::whereDate('created_at', \Carbon\Carbon::today())->count() }} {{ __('bap.today_users') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
