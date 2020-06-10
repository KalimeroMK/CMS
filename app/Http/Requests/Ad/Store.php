<?php

namespace App\Http\Requests\Ad;

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
    public function rules()
    {
        return [
            'code' => 'required',
            'position' => 'required',
        ];
    }
}
