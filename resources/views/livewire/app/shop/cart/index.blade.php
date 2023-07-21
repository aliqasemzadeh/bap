<div>
    <x-slot name="title">
        {{ __('bap.cart') }}
    </x-slot>

    <x-slot name="actions">
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('shop.cart.checkout') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                        </svg>
                        {{ __('bap.checkout') }}
                    </a>
                    <a href="{{ route('shop.cart.checkout') }}" class="btn btn-primary d-sm-none btn-icon" aria-label="Create new report">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                        </svg>
                    </a>
                </div>
            </div>
    </x-slot>

    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('bap.cart') }}</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                    @foreach(\Cart::getContent() as $item)
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="{{ route('shop.product.view', [$item->id]) }}">
                                    <span class="avatar" style="background-image: url( {{ $item->attributes->icon }} )"></span>
                                </a>
                            </div>
                            <div class="col text-truncate">
                                <a href="#" class="text-reset d-block">{{ $item->name }}</a>
                                <div class="d-block text-muted text-truncate mt-n1">
                                    {{ $item->quantity }} X {{ $item->price }} = {{ $item->getPriceSum() }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <button wire:click="removeItem({{$item->id}})" class="list-group-item-actions"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
