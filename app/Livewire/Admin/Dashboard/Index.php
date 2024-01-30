<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    #[On('admin.dashboard.index')]
    public function render()
    {
        if(!auth()->user()->can('admin_dashboard_index')) {
            return abort(403);
        }

        return view('livewire.admin.dashboard.index')->layout('layouts.admin');
    }
}
