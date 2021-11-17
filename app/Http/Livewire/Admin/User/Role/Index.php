<?php

namespace App\Http\Livewire\Admin\User\Role;

use Spatie\Permission\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $selectedRoles = [];
    public $selectAll = false;

    public $role;
    public $search;
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
        if(!auth()->user()->can('admin_roles_delete')) {
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
        if(!auth()->user()->can('admin_roles_delete')) {
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

    public function mount()
    {
        if(!auth()->user()->can('admin_roles_index')) {
            return abort(403);
        }

        $this->search = request()->query('search', $this->search);
    }

    public function updatedSelectAll($value)
    {
        if($value) {
            $this->selectedRoles = Role::pluck('id')->toArray();
        } else {
            $this->selectedRoles = [];
        }

    }

    public function updatedSelectedRoles($value)
    {
        if($this->selectAll) {
            $this->selectAll = false;
        }

    }

    public function deleteSelected()
    {
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
        if(!auth()->user()->can('admin_roles_delete')) {
            return abort(403);
        }

        Role::query()
            ->whereIn('id', $this->selectedRoles)
            ->delete();
        $this->selectedRoles = [];
        $this->selectAll = false;

        $this->alert(
            'success',
            __('bap.removed')
        );
    }


    public function render()
    {
        if(!auth()->user()->can('admin_roles_index')) {
            return abort(403);
        }

        $roles = Role::where('name', 'LIKE', '%' . $this->search . '%')->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.user.role.index', compact('roles'))->layout('layouts.admin');
    }
}
