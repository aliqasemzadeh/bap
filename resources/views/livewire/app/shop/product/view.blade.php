<div>
    <x-slot name="title">
        {{ $product->title }}
    </x-slot>

    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="img-responsive img-responsive-21x9 card-img-top"
                     style="background-image: url({{ $product->getMedia()[0]->getFullUrl() }})"></div>
                <div class="card-body">
                    <p class="text-muted">{{ $product->current_price }}</p>
                    <a href="{{ route('shop.product.view', [$product->id]) }}" class="btn btn-primary w-100 stretched-link">{{ __('bap.add_cart') }}</a>
                </div>
            </div>
        </div>
        <div class="col-9">
            {{ $product->description }}
        </div>
    </div>
</div>
