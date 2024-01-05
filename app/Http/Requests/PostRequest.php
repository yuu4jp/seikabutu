<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user.name'=>'required|string',
            'user.email'=>'required',
            'user.password'=>'required',
            'user.sex'=>'required|string',
            'user.age'=>'required|integer',
            'user.departure'=>'required',
            'user.master'=>'required',
            
        ];
    }
}
