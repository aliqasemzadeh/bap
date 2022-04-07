<?php

namespace App\Http\Livewire\Admin\Support\Ticket;

use App\Models\Ticket;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $selectedItems = [];
    public $selectAll = false;

    public $ticket;
    public $search;
    public $perPage = 15;
    public $sortColumn = 'updated_at';
    public $sortDirection = 'asc';

    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];
    protected $listeners = [
        'confirmedDeleteArticle',
        'cancelledDeleteArticle',
        'deleteSelectedQuery',
        'updateList' => 'render'
    ];


    public function mount()
    {
        if(!auth()->user()->can('admin_ticket_index')) {
            return abort(403);
        }

        $this->search = request()->query('search', $this->search);
    }

    public function clear()
    {
        $this->search = "";
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    public function updatedSelectAll($value)
    {
        if($value) {
            $this->selectedItems = Ticket::pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }

    }

    public function updatedSelectedItems($value)
    {
        if($this->selectAll) {
            $this->selectAll = false;
        }
    }

    public function archiveSelected()
    {
        if(!auth()->user()->can('admin_user_delete')) {
            return abort(403);
        }
        $this->confirm(__('bap.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('bap.cancel'),
            'onConfirmed' => 'archiveSelectedQuery',
            'onCancelled' => 'cancelledDelete'
        ]);
    }

    public function archiveSelectedQuery()
    {
        if(!auth()->user()->can('admin_user_delete')) {
            return abort(403);
        }
        Ticket::query()
            ->whereIn('id', $this->selectedItems)
            ->update(['status', 'done']);
        $this->selectedItems = [];
        $this->selectAll = false;

        $this->alert(
            'success',
            __('bap.done')
        );
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

    public function render()
    {
        if(!auth()->user()->can('admin_ticket_index')) {
            return abort(403);
        }

        $tickets = Ticket::with(['user', 'category'])->filter(['search' => $this->search])->whereIn('status', ['new', 'user'])->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.support.ticket.index', compact('tickets'))->layout('layouts.admin');
    }
}
