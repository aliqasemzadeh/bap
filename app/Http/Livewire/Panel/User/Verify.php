<?php

namespace App\Http\Livewire\Panel\User;

use App\Models\UserVerify;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Verify extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $first_name;
    public $last_name;
    public $national_code;
    public $birth_at;
    public $phone;
    public $country;
    public $region;
    public $city;
    public $address;

    public $verify;

    public function verify_request()
    {
        if(!$this->verify->id_card_file) {
            $this->alert('warning', __('bap.please_upload_id_card_file'));
        } else if(!$this->verify->verify_file) {
            $this->alert('warning', __('bap.please_upload_verify_file'));
        } else {
            $this->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'national_code' => 'required|string',
                'birth_at' => 'required|string',
            ]);

            $this->verify->first_name = $this->first_name;
            $this->verify->last_name = $this->last_name;
            $this->verify->national_code = $this->national_code;
            $this->verify->birth_at = $this->birth_at;
            $this->verify->status = 'wait';
            $this->verify->save();

            $this->alert('success', __('bap.request_sent'));
        }

        $this->alert('warning', __('bap.please_check_data'));
    }

    public function mount()
    {
        if($verify = UserVerify::where('user_id', auth()->user()->id)->first()) {
            $this->verify = $verify;
            $this->verify->save();
        } else {
            $this->verify = new UserVerify();
            $this->verify->random_string = rand(config('bap.verify_code_start'), config('bap.verify_code_finish'));
            $this->verify->user_id = auth()->user()->id;
            $this->verify->status = 'start';
            $this->verify->save();
        }
    }

    public function render()
    {
        $verify = UserVerify::firstOrCreate([
            'user_id' => Auth::user()->id
        ]);

        if($verify->status == 'new') {
            $verify->random_string = rand(config('bap.verify_code_start'), config('bap.verify_code_finish'));
            $verify->save();
        }

        return view('livewire.panel.user.verify', ['random_string'=> $verify->random_string, 'verify' => $verify])->layout('layouts.panel');
    }
}
