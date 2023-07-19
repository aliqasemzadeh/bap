<div>
    <x-slot name="title">
        {{ __('bap.shop') }}
    </x-slot>


    <div class="row row-cards">
        @foreach($products as $product)
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="img-responsive img-responsive-21x9 card-img-top"
                         style="background-image: url({{ $product->getMedia()[0]->getFullUrl() }})"></div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->title }}</h3>
                        <p class="text-muted">{{ $product->current_price }}</p>
                        <a href="{{ route('shop.product.view', [$product->id]) }}" class="btn btn-primary w-100 stretched-link">{{ __('bap.detail') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
