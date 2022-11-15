<?php

namespace App\Http\Livewire\Panel\User\Verify;

use App\Models\UserVerify;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadIdCardFile extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $verify;
    public $random_string;
    public $id_card_file;
    public function mount(UserVerify $verify)
    {
        $this->verify = $verify;
        $this->random_string = $verify->random_string;
    }

    public function upload()
    {
        $this->validate(['id_card_file' => 'required|image']);

        $this->id_card_file->store('id_card_files');

        $this->alert('success', __('bap.uploaded'));
    }

    public function render()
    {
        return view('livewire.panel.user.verify.upload-id-card-file');
    }
}
