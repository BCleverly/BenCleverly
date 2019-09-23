<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'hero' => ['required', 'image'],
            'body' => ['required'],
        ];
    }
}
