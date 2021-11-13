<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'confirmedDelete',
        'cancelledDelete',
        'updateList' => 'render'
    ];

    public function render()
    {
        $users = User::paginate(15);
        return view('livewire.admin.user.index', compact('users'))->layout('layouts.admin');
    }
}
