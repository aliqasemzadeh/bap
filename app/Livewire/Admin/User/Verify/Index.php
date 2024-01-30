<?php

namespace App\Livewire\Admin\User\Verify;

use App\Models\UserVerify;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $selectedVerifies = [];
    public $selectAll = false;

    public $verify;
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

    #[On('admin.user.verify.index')]
    public function render()
    {
        if(!auth()->user()->can('admin_user_verify')) {
            return abort(403);
        }

        $verifies = UserVerify::where('national_code', 'LIKE', '%' . $this->search . '%')->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.user.verify.index', compact('verifies'))->layout('layouts.admin');
    }
}
