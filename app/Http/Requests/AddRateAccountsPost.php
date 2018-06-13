<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddRateAccountsPost extends FormRequest
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
            'name' => 'required|string|max:255',
            'label' => 'string|max:255',
            'date_left' => 'required',
            'coefficient' => 'required',
            'chance' => 'required',
            'cost' => 'required',
            'body' => 'required',
        ];
    }
}
