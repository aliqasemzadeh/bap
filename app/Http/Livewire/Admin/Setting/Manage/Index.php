<?php

namespace App\Http\Livewire\Admin\Setting\Manage;

use Illuminate\Support\Facades\Artisan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public function turn_on()
    {
        Artisan::call("up");
        $this->alert('success', __('bap.system_turned_on'));
    }

    public function turn_off()
    {
        Artisan::call("down");
        $this->alert('success', __('bap.system_turned_off'));
    }


    public function render()
    {
        return view('livewire.admin.setting.manage.index')->layout('layouts.admin');
    }
}
