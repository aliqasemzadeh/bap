<?php

namespace App\Http\Livewire\Admin\User\Team;

use App\Models\Team;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;

    public $team;
    public $name;
    public $user_id;
    public $personal;
    public $search = "";
    protected $updatesQueryString = ['search'];


    public function mount(Team $team)
    {
        $this->team = $team;
        $this->name = $team->name;
        $this->user_id = $team->user_id;
        $this->personal = $team->personal_team;

        $this->search = User::findOrFail($this->user_id)->name;

    }

    public function setUser($user_id)
    {
        $this->user_id = $user_id;
        $this->alert(
            'success',
            __('bap.user_selected')
        );
    }

    public function edit()
    {
        $this->validate(['name' => 'required', 'personal' => 'required', 'user_id' => 'required']);

        $this->team->name = $this->name;
        $this->team->user_id = $this->user_id;
        $this->team->personal_team = $this->personal;
        $this->team ->save();

        $this->emitTo(\App\Http\Livewire\Admin\User\Team\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert(
            'success',
            __('bap.edited')
        );
    }

    public function render()
    {
        if($this->search != "") {
            $users = User::filter(['search' => $this->search])->get();
        } else {
            $users = [];
        }

        return view('livewire.admin.user.team.edit', compact('users'));
    }
}
