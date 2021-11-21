<div>
    <x-slot name="title">
        {{ __('bap.articles') }}
    </x-slot>

    @empty($articles)
        <div class="empty">
            <div class="empty-img">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="128" height="128" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="9" y1="10" x2="9.01" y2="10" /><line x1="15" y1="10" x2="15.01" y2="10" /><line x1="9" y1="15" x2="15" y2="15" /></svg>
            </div>
            <p class="empty-title">{{ __('bap.no_result') }}</p>

            @can('admin_article_create')
            <div class="empty-action">
                <button onclick="Livewire.emit('showModal', 'admin.content.article.create')" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    {{ __('bap.create_article') }}
                </button>
            </div>
            @endcan
        </div>
    @endempty
    <div class="row row-cards">
        @foreach($articles as $article)
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
                <a href="{{ route('article.view', [$article->id]) }}" class="d-block"><img src="{{ $article->getMedia()[0]->getFullUrl() }}" class="card-img-top" width="313" height="209"></a>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="avatar me-3 rounded" style="background-image: url({{ $article->user->gravatar }})"></span>
                        <div>
                            <div>{{ $article->title }}</div>
                            <div class="text-muted">{{ $article->category->title }}</div>
                        </div>
                        <div class="ms-auto">
                            <a href="#" class="text-muted">
                                <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                                {{ $article->views }}
                            </a>
                            <a href="#" class="ms-3 text-muted">
                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg>
                                {{ $article->likes }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>




</div>
