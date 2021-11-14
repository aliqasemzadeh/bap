<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $user;


    protected $listeners = [
        'confirmedDelete',
        'cancelledDelete',
        'updateList' => 'render'
    ];

    public function delete(User $user)
    {
        //$this->authorize('delete', $user);
        $this->confirm(__('bap.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('bap.cancel'),
            'onConfirmed' => 'confirmedDelete',
            'onCancelled' => 'cancelledDelete'
        ]);
        $this->user = $user;
    }

    public function confirmedDelete()
    {
        //$this->authorize('delete', $this->watcher);
        $this->user->delete();
        $this->emit('updateWatcherList');
        $this->alert(
            'success',
            __('panel.removed')
        );
    }

    public function cancelledDelete()
    {
        //$this->authorize('delete', $this->user);
        $this->alert(
            'success',
            __('bap.cancelled')
        );
    }

    public function render()
    {
        $users = User::paginate(15);
        return view('livewire.admin.user.index', compact('users'))->layout('layouts.admin');
    }
}
