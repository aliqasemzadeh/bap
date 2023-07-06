<?php

namespace App\Http\Livewire\Admin\User\Verify;

use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
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
        $this->random_string = $this->verify->random_string;

    }
    public function accept()
    {
        $user = User::findOrFail($this->verify->user_id);
        $user->verified_at = Carbon::now();
        $user->save();

        $this->verify->status = 'accept';
        $this->verify->save();

        $this->emitTo(\App\Http\Livewire\Admin\User\Verify\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.accepted'));
    }

    public function reject()
    {
        $this->verify->status = 'reject';
        $this->verify->save();

        $this->emitTo(\App\Http\Livewire\Admin\User\Verify\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.rejected'));
    }

    public function inquiry()
    {

    }

    public function render()
    {
        return view('livewire.admin.user.verify.check');
    }
}
