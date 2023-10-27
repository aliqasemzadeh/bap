<?php

namespace App\Livewire\Panel\User;

use App\Jobs\SendMobileTextMessageJob;
use App\Models\UserVerifyCode;
use App\Rules\CheckUserVerifyCodeRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Mobile extends Component
{
    use LivewireAlert;
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
        $this->userVerifyCode = $userVerifyCode;

        SendMobileTextMessageJob::dispatch(__('bap.verify_code_is', [$userVerifyCode->code]), $this->mobile);

        $this->wait = true;
    }

    public function verify()
    {
        $this->validate([
            'verify_code' => ['required', new CheckUserVerifyCodeRule('mobile', 'sms')]
        ]);

        $this->userVerifyCode->status = 'used';
        $this->userVerifyCode->save();

        auth()->user()->mobile = $this->userVerifyCode->value;
        auth()->user()->save();

        $this->wait = false;
        $this->mobile = Auth::user()->mobile;

        $this->alert('success', __('bap.mobile_verified_successfully'));

    }

    public function render()
    {
        return view('livewire.panel.user.mobile')->layout('layouts.panel');
    }
}
