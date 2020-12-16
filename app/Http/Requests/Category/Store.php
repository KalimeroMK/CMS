<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\CanAuthorise;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    use CanAuthorise;


    /**
     * @var mixed
     */
    public $title;
    /**
     * @var mixed
     */
    public $parent_id;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
        ];
    }
}
