<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Ban extends Component
{
    use LivewireAlert;
    public $user;
    public $comment;
    public $expire;
    public $permanent;

    public function mount($user)
    {
        $this->user = User::findOrFail($user);
    }

    public function ban()
    {
        if($this->permanent) {
            $this->user->ban([
                'expired_at' => null,
                'comment' => $this->comment,
            ]);
        } else {
            $this->user->ban([
                'expired_at' => $this->expire,
                'comment' => $this->comment,
            ]);
        }

        $this->dispatchTo(\App\Livewire\Admin\User\Index::getName(), 'updateList');
        $this->dispatch('hideModal');

        $this->alert('success', __('bap.banned'));
    }

    public function unban()
    {
        $this->user->unban();

        $this->dispatchTo(\App\Livewire\Admin\User\Index::getName(), 'updateList');
        $this->dispatch('hideModal');

        $this->alert('success', __('bap.unbanned'));
    }

    public function render()
    {
        return view('livewire.admin.user.ban');
    }
}
