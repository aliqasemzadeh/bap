<?php

namespace App\Http\Livewire\Admin\Content\Article;

use App\Models\Article;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $selectedItems = [];
    public $selectAll = false;

    public $article;
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

    public function delete(Article $article)
    {
        if(!auth()->user()->can('admin_user_delete')) {
            return abort(403);
        }
        $this->confirm(__('bap.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('bap.cancel'),
            'onConfirmed' => 'confirmedDeleteArticle',
            'onCancelled' => 'cancelledDeleteArticle'
        ]);
        $this->article = $article;
    }


    public function confirmedDeleteArticle()
    {
        if(!auth()->user()->can('admin_user_delete')) {
            return abort(403);
        }
        $this->article->delete();
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
            $this->selectedItems = Article::pluck('id')->toArray();
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
        Article::query()
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
        $articles = Article::with(['user', 'category'])->filter(['search' => $this->search])->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.content.article.index', compact('articles'))->layout('layouts.admin');
    }
}
