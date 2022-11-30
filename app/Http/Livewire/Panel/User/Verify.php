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

    public $random_string;
    public $id_card_file;
    public $verify_file;
    public $first_name;
    public $last_name;
    public $national_code;
    public $zipcode;
    public $phone;
    public $country;
    public $region;
    public $city;
    public $address;

    public $verify;

    public function verify_request()
    {
        $this->validate(['verify_file' => 'required|image']);

        //TODO: Upload File
        $this->alert('success', __('bap.request_sent'));
    }

    public function mount()
    {
        if($verify = UserVerify::where('user_id', auth()->user()->id)->first()) {
            $this->verify = $verify;
        } else {
            $verify = new UserVerify();
            $verify->random_string= rand(config('bap.verify_code_start'), config('bap.verify_code_finish'));
            $verify->user_id = auth()->user()->id;
            $verify->status = 'start';
            $verify->save();
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
