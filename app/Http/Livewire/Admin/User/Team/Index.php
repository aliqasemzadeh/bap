<?php

namespace App\Http\Livewire\Admin\User\Team;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search;
    public $team;
    public $perPage = 15;
    public $sortColumn = 'created_at';
    public $sortDirection = 'asc';

    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    protected $listeners = [
        'confirmedDelete',
        'cancelledDelete',
        'deleteSelectedQuery',
        'updateList' => 'render'
    ];

    public function clear()
    {
        $this->search = "";
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    public function sortByColumn($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->reset('sortDirection');
            $this->sortColumn = $column;
        }
    }

    public function delete(Role $role)
    {
        if(!auth()->user()->can('admin_team_delete')) {
            return abort(403);
        }

        $this->confirm(__('bap.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('bap.cancel'),
            'onConfirmed' => 'confirmedDelete',
            'onCancelled' => 'cancelledDelete'
        ]);
        $this->role = $role;
    }

    public function confirmedDelete()
    {
        if(!auth()->user()->can('admin_team_delete')) {
            return abort(403);
        }

        $this->role->delete();
        $this->emit('updateList');
        $this->alert(
            'success',
            __('bap.removed')
        );
    }

    public function cancelledDelete()
    {
        $this->alert(
            'success',
            __('bap.cancelled')
        );
    }

    public function updatedSelectAll($value)
    {
        if($value) {
            $this->selectedRoles = Team::pluck('id')->toArray();
        } else {
            $this->selectedRoles = [];
        }
    }

    public function render()
    {
        if(!auth()->user()->can('admin_user_teams')) {
            return abort(403);
        }

        $teams = \App\Models\Team::where('name', 'LIKE', '%' . $this->search . '%')->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.user.team.index', compact('teams'))->layout('layouts.admin');
    }
}
