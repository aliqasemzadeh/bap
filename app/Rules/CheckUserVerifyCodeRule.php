<?php

namespace App\Rules;

use App\Models\UserVerifyCode;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class CheckUserVerifyCodeRule implements ValidationRule
{

    public $type;
    public $method;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type, $method)
    {
        $this->type = $type;
        $this->method = $method;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $UserVerifyCodeCount = UserVerifyCode::where(['code' => $value, 'type' => $this->type, 'method' => $this->method, 'user_id' => Auth::user()->id])->where('status', 'unused')->count();
        if($UserVerifyCodeCount == 0) {
            $fail(__('bap.verify_code_is_wrong'));
        }
    }

}
