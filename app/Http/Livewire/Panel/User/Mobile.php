<?php

namespace App\Http\Livewire\Panel\User;

use App\Models\UserVerifyCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Mobile extends Component
{
    public $mobile;
    public $userVerifyCode;
    public $verify_code;
    public $wait = false;

    public function mount()
    {
        $this->mobile = Auth::user()->mobile;
        if($userVerifyCode = UserVerifyCode::where(['status' => 'unused', 'user_id' => Auth::user()->id, 'type' => 'mobile', 'method' => 'sms',])->first()) {
            $this->wait = true;
            $this->userVerifyCode = $userVerifyCode;
        }
    }

    public function send()
    {
        $this->validate([
            'mobile' => 'required'
        ]);

        $userVerifyCode = UserVerifyCode::firstOrCreate([
            'status' => 'unused',
            'user_id' => Auth::user()->id,
            'type' => 'mobile',
            'method' => 'sms',
        ]);
        $userVerifyCode->ip = Request::ip();
        $userVerifyCode->code = rand(config('bap.verify_code_start'), config('bap.verify_code_finish'));
        $userVerifyCode->value = $this->mobile;
        $userVerifyCode->save();
        $this->wait = true;
    }

    public function verify()
    {

    }

    public function render()
    {
        return view('livewire.panel.user.mobile')->layout('layouts.panel');
    }
}
