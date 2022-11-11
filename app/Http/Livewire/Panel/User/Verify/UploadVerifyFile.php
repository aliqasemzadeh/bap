<?php

namespace App\Http\Livewire\Panel\User\Verify;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadVerifyFile extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $random_string;
    public $verify_file;
    public function mount($random_string)
    {
        $this->random_string = $random_string;
    }

    public function upload()
    {
        $this->validate(['id_card_file' => 'required|image']);
    }

    public function render()
    {
        return view('livewire.panel.user.verify.upload-verify-file');
    }
}
