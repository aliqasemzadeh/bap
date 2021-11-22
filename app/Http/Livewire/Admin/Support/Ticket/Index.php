<?php

namespace App\Http\Livewire\Admin\Support\Ticket;

use App\Models\Article;
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
    public $sortColumn = 'created_at';
    public $sortDirection = 'asc';

    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];
    protected $listeners = [
        'confirmedDeleteArticle',
        'cancelledDeleteArticle',
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

    public function mount()
    {
        if(!auth()->user()->can('admin_ticket_index')) {
            return abort(403);
        }

        $this->search = request()->query('search', $this->search);
    }



    public function render()
    {
        if(!auth()->user()->can('admin_ticket_index')) {
            return abort(403);
        }

        $tickets = Ticket::with(['user', 'category'])->filter(['search' => $this->search])->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.support.ticket.index', compact('tickets'))->layout('layouts.admin');
    }
}
