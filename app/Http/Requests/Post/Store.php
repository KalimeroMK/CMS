<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\CanAuthorise;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed title
 * @property mixed tags
 * @property mixed featured_image
 * @property mixed category
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
            'title' => 'required|unique:posts,title',
            'description' => 'required',
            'category' => 'required',
            'featured_image' => 'required|image|'


        ];
    }
}
