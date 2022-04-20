<div>
    <x-slot name="title">
        {{ __('bap.home') }}
    </x-slot>

    <div class="row row-cards">
        @if(config('bap.home.display-carousels'))
        <div class="col-md-12">
            <div class="card mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('bap.carousels') }}</h3>
                </div>
                <div class="card-body">
                    <div id="carousel-captions" class="carousel slide pointer-event" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" alt="" src="./static/photos/1366fdc9b9b277e4.jpg">
                                <div class="carousel-caption-background d-none d-md-block"></div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Slide label</h3>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            @foreach($carousels as $carousel)
                            <div class="carousel-item">
                                <img class="d-block w-100" alt="{{ $carousel->title }}" src="{{ $carousel->getMedia()[0]->getFullUrl() }}">
                                <div class="carousel-caption-background d-none d-md-block"></div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>{{ $carousel->title }}</h3>
                                    <p>{{ $carousel->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-captions" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-captions" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endif

        @if(config('bap.home.display-articles'))
        <div class="col-md-12">
            <div class="card mb-2">
            <div class="card-header">
                <h3 class="card-title">{{ __('bap.articles') }}</h3>
            </div>
            <div class="list-group list-group-flush list-group-hoverable">
                @foreach($articles as $article)
                <div class="list-group-item">
                    <div  href="{{ route('article.view', [$article->id]) }}" class="row align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('article.view', [$article->id]) }}">
                                <span class="avatar" style="background-image: url({{ $article->getMedia()[0]->getFullUrl() }})"></span>
                            </a>
                        </div>
                        <div class="col text-truncate">
                            <a href="{{ route('article.view', [$article->id]) }}" class="d-block">{{ $article->title }}</a>
                            <small class="d-block text-muted text-truncate mt-n1">{{ $article->description }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
        @endif
    </div>
</div>
