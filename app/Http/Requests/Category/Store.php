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
    public $name;
    /**
     * @var mixed
     */
    public $country;
    /**
     * @var mixed
     */
    public $title;

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
