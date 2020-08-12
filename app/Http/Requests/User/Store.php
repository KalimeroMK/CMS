<?php

namespace App\Http\Requests\User;

use App\Http\Requests\CanAuthorise;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    use CanAuthorise;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|',
            'role' => 'required',
            'password' => 'confirmed|min:6',
        ];
    }
}
