<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddPaymentPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user() && Auth::user()->adm){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_email' => 'required|email',
            'rate_id' => 'required|exists:rates,id',
            'value' => 'required|numeric',
            'comment' => 'string|nullable|max:120',
            'promo_code' => 'string|nullable|max:25|exists:codes,code',
        ];
    }
}
