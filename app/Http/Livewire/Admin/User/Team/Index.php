<?php

namespace App\Http\Livewire\Admin\User\Team;

use App\Models\Article;
use App\Models\Team;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $selectedItems = [];
    public $selectAll = false;

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

    public function deleteSelected()
    {
        if(!auth()->user()->can('admin_team_delete')) {
            return abort(403);
        }
        $this->confirm(__('bap.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('bap.cancel'),
            'onConfirmed' => 'deleteSelectedQuery',
            'onCancelled' => 'cancelledDelete'
        ]);
    }

    public function deleteSelectedQuery()
    {
        if(!auth()->user()->can('admin_team_delete')) {
            return abort(403);
        }

        Team::query()
            ->whereIn('id', $this->selectedItems)
            ->delete();
        $this->selectedItems = [];
        $this->selectAll = false;

        $this->alert(
            'success',
            __('bap.removed')
        );
    }

    public function updatedSelectAll($value)
    {
        if($value) {
            $this->selectedItems = Team::pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }

    public function delete(Team $team)
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

        $this->team = $team;
    }

    public function confirmedDelete()
    {
        if(!auth()->user()->can('admin_team_delete')) {
            return abort(403);
        }

        $this->team->delete();
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

    public function render()
    {
        if(!auth()->user()->can('admin_user_teams')) {
            return abort(403);
        }

        $teams = \App\Models\Team::where('name', 'LIKE', '%' . $this->search . '%')->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.user.team.index', compact('teams'))->layout('layouts.admin');
    }
}
