<div>
    <x-slot name="title">
        {{ __('bap.home') }}
    </x-slot>

    <div class="row row-cards">
        <div class="col-md-12">
        <div class="card mb-3">
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
                            <a href="{{ route('article.view', [$article->id]) }}" class="text-body d-block">{{ $article->title }}</a>
                            <small class="d-block text-muted text-truncate mt-n1">{{ $article->description }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
