<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        if(!auth()->user()->can('admin_dashboard_index')) {
            return abort(403);
        }

        return view('livewire.admin.dashboard.index')->layout('layouts.admin');
    }
}
