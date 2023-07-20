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

                    <div class="mb-3">
                        <div class="row g-3">
                            <div class="col-auto">
                                <a href="#" class="btn btn-icon" aria-label="Button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="col">
                                <input type="text" value="0" class="form-control" placeholder="Search for…">
                            </div>
                            <div class="col-auto">
                                <a href="#" class="btn btn-icon" aria-label="Button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-9">
            {{ $product->description }}
        </div>
    </div>
</div>
