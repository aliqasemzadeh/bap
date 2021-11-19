<?php

namespace App\Http\Livewire\Admin\Setting\Category;

use App\Models\Category;
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

    public $category;
    public $search;
    public $perPage = 15;
    public $sortColumn = 'created_at';
    public $sortDirection = 'asc';

    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['search'];

    protected $listeners = [
        'confirmedDeleteCategory',
        'cancelledDeleteCategory',
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

    public function delete(Category $category)
    {
        if(!auth()->user()->can('admin_user_delete')) {
            return abort(403);
        }
        $this->confirm(__('bap.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('bap.cancel'),
            'onConfirmed' => 'confirmedDeleteCategory',
            'onCancelled' => 'cancelledDeleteCategory'
        ]);
        $this->category = $category;
    }


    public function confirmedDeleteCategory()
    {
        if(!auth()->user()->can('admin_user_delete')) {
            return abort(403);
        }
        $this->category->delete();
        $this->emit('updateList');
        $this->alert(
            'success',
            __('bap.removed')
        );
    }

    public function cancelledDeleteCategory()
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
            $this->selectedItems = Category::pluck('id')->toArray();
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
        Category::query()
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
        if(!auth()->user()->can('admin_user_index')) {
            return abort(403);
        }
        $categories = Category::filter(['search' => $this->search])->orderBy($this->sortColumn, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.setting.category.index', compact('categories'))->layout('layouts.admin');
    }
}
