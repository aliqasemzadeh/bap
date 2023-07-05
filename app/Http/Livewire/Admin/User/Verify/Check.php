<?php

namespace App\Http\Livewire\Admin\User\Verify;

use App\Models\UserVerify;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Check extends Component
{
    use LivewireAlert;
    public $verify;
    public $first_name;
    public $last_name;
    public $national_code;
    public $birth_at;
    public $note;

    public function mount(UserVerify $verify)
    {
        $this->verify = $verify;

        $this->first_name = $this->verify->first_name;
        $this->last_name = $this->verify->last_name;
        $this->national_code = $this->verify->national_code;
        $this->birth_at = $this->verify->birth_at;
        $this->note = $this->verify->note;

    }
    public function accept()
    {
        $this->verify->status = 'accept';
        $this->verify->save();
    }

    public function reject()
    {
        $this->verify->status = 'reject';
        $this->verify->save();
    }

    public function inquiry()
    {

    }

    public function render()
    {
        return view('livewire.admin.user.verify.check');
    }
}
