<?php

namespace App\Http\Livewire\Admin\User\Team;

use App\Models\Team;
use Livewire\Component;

class Users extends Component
{
    public $team;
    public function mount(Team $team)
    {
        $this->team = $team;
    }

    public function render()
    {
        return view('livewire.admin.user.team.users');
    }
}
