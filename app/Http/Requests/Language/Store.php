<?php

namespace App\Http\Requests\Language;

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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:languages',
            'country' => 'required|string|max:255|unique:languages',
        ];
    }
}
