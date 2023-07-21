<div class="nav-item dropdown me-3">
    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show cart"
       aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24"
             height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
             stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
            <path d="M17 17h-11v-14h-2"></path>
            <path d="M6 5l14 1l-1 7h-13"></path>
        </svg>
        @if(\Cart::getContent()->count())
            <span class="badge bg-red"></span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ __('bap.cart_detail') }}
                </h3>
            </div>
            <div class="list-group list-group-flush list-group-hoverable">
                @foreach(\Cart::getContent() as $item)
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="avatar me-2"
                                                        style="background-image: url( {{ $item->attributes->icon }} )"></span>
                            </div>
                            <div class="col text-truncate">
                                <a href="{{ route('shop.product.view', [$item->id]) }}"
                                   class="text-body d-block">{{ $item->name }}</a>
                                <div class="d-block text-muted text-truncate mt-n1">
                                    {{ $item->getPriceSum() }}
                                </div>
                            </div>
                            <div class="col-auto">
                                {{ $item->quantity }}
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="list-group-item">
                        <a href="{{ route('shop.cart.index')}}" class="btn btn-primary w-100">{{ __('bap.checkout') }}</a>
                    </div>
            </div>
        </div>
    </div>
</div>
