<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\CanAuthorise;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed title
 * @property mixed post
 * @property mixed tags
 * @property mixed featured_image
 * @property mixed category
 */
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
            'featured_image' => 'nullable|image'
        ];
    }
}
