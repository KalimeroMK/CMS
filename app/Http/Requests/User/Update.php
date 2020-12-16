<?php

namespace App\Http\Requests\User;

use App\Http\Requests\CanAuthorise;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
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
            'email' => [
                'required',
                Rule::unique('users', 'id')->ignore($this['id']),
            ], 'roles' => 'required',
        ];
    }
}
