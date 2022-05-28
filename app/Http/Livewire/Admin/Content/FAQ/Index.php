<?php

namespace App\Http\Livewire\Admin\Content\FAQ;

use App\Models\Article;
use App\Models\FrequentlyAskedQuestion;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $selectedItems = [];
    public $selectAll = false;

    public $faq;
    public $search;
    public $perPage = 15;
    public $sortColumn = 'created_at';
    public $sortDirection = 'asc';

    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    protected $listeners = [
        'confirmedDeleteFAQ',
        'cancelledDeleteFAQ',
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

    public function delete(FrequentlyAskedQuestion $faq)
    {
        if(!auth()->user()->can('admin_user_delete')) {
            return abort(403);
        }
        $this->confirm(__('bap.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('bap.cancel'),
            'onConfirmed' => 'confirmedDeleteFAQ',
            'onCancelled' => 'cancelledDeleteFAQ'
        ]);
        $this->faq = $faq;
    }


    public function confirmedDeleteArticle()
    {
        if(!auth()->user()->can('admin_user_delete')) {
            return abort(403);
        }
        $this->faq->delete();
        $this->emit('updateList');
        $this->alert(
            'success',
            __('bap.removed')
        );
    }

    public function cancelledDeleteArticle()
    {
        $this->alert(
            'success',
            __('bap.cancelled')
        );
    }

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function updatedSelectAll($value)
    {
        if($value) {
            $this->selectedItems = FrequentlyAskedQuestion::pluck('id')->toArray();
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

    public function deleteSelected()
    {
        if(!auth()->user()->can('admin_user_delete')) {
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
        if(!auth()->user()->can('admin_user_delete')) {
            return abort(403);
        }
        FrequentlyAskedQuestion::query()
            ->whereIn('id', $this->selectedItems)
            ->delete();
        $this->selectedItems = [];
        $this->selectAll = false;

        $this->alert(
            'success',
            __('bap.removed')
        );
    }
    public function render()
    {
        if(!auth()->user()->can('admin_article_index')) {
            return abort(403);
        }

        $faqs = FrequentlyAskedQuestion::filter(['search' => $this->search])->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.content.f-a-q.index', compact('faqs'))->layout('layouts.admin');
    }
}
