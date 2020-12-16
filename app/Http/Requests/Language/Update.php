<?php

namespace App\Http\Requests\Language;

use App\Http\Requests\CanAuthorise;
use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    use CanAuthorise;

    /**
     * @property mixed title
     * @property mixed parent_id
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',

        ];
    }
}
