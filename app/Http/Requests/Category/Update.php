<?php

namespace App\Http\Requests\Category;

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
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'parent_id' => 'not_in:' . $this->route('category')->id,
        ];
    }
}
