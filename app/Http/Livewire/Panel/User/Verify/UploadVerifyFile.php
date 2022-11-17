<?php

namespace App\Http\Livewire\Panel\User\Verify;

use App\Models\UserVerify;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadVerifyFile extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $verify;
    public $random_string;
    public $verify_file;
    public function mount(UserVerify $verify)
    {
        $this->verify = $verify;
        $this->random_string = $verify->random_string;
    }

    public function upload()
    {
        $this->validate(['verify_file' => 'required|image']);

        $this->verify_file->store('verify_files');

        $this->alert('success', __('bap.uploaded'));
    }

    public function render()
    {
        return view('livewire.panel.user.verify.upload-verify-file');
    }
}
