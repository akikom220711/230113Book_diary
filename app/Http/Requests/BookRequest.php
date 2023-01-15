<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'string|max:255',
            'publisher' => 'string|max:255',
            'published_year' => 'string|max:255',
            'comment' => 'string|max:2000',
            'read_date' => 'requierd|date',
        ];
    }
}
