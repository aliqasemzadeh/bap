<?php

namespace App\Http\Livewire\Admin\User\Verify;

use App\Models\UserVerify;
use Livewire\Component;

class Check extends Component
{
    public $verify;

    public function mount(UserVerify $verify)
    {
        $this->verify = $verify;
    }
    public function render()
    {
        return view('livewire.admin.user.verify.check');
    }
}
