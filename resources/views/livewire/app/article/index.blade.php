<div>
    @empty($records)
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
</div>
