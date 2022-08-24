<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('bap.users') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('bap.close') }}"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <ul class="list-group">
                        @foreach($role->users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $user->email }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

