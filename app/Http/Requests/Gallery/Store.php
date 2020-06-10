<?php

namespace App\Http\Requests\Gallery;

use App\Http\Requests\CanAuthorise;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed title
 * @property mixed parent_id
 */
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
            'title' => 'required|string|max:255',
        ];
    }
}
