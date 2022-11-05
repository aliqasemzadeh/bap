<?php

namespace App\Http\Livewire\Panel\User;

use App\Models\UserVerify;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Verify extends Component
{
    use WithFileUploads;

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

    public function mount()
    {
        if($verify = UserVerify::where('user_id', auth()->user()->id)->first()) {
            $this->verify = $verify;
        } else {
            $verify = new UserVerify();
            $verify->random_string = rand(101010, 909090);
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
            $verify->random_string = rand(100000, 989898);
            $verify->save();
        }

        return view('livewire.panel.user.verify', ['random_string'=> $verify->random_string, 'verify' => $verify])->layout('layouts.panel');
    }
}
