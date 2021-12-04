<?php

namespace App\Http\Livewire\App\User;

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
        $this->verify = UserVerify::firstOrCreate([
            'user_id' => Auth::user()->id
        ]);
        if($this->verify->status == 'new') {
            $this->verify->random_string = rand(100000, 989898);
            $this->verify->save();
        }
    }

    public function render()
    {
        return view('livewire.app.user.verify');
    }
}
