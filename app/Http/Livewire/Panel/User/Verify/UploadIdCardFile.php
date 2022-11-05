<?php

namespace App\Http\Livewire\Panel\User\Verify;

use Livewire\Component;

class UploadIdCardFile extends Component
{
    public $random_string;
    public function mount($random_string)
    {
        $this->random_string = $random_string;
    }

    public function render()
    {
        return view('livewire.panel.user.verify.upload-id-card-file');
    }
}
