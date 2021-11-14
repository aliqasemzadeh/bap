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

    protected $listeners = [
        'confirmedDelete',
        'cancelledDelete',
        'updateList' => 'render'
    ];

    public function show()
    {
        $this->alert('success', 'Basic Alert');
    }

    public function render()
    {
        $users = User::paginate(15);
        return view('livewire.admin.user.index', compact('users'))->layout('layouts.admin');
    }
}
