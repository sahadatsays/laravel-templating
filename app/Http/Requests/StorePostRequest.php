<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd($this->all());
        return [
            'title.en' => ['required', 'max:255', 'string'],
            'title.bn' => ['required', 'max:255', 'string'],
            'title.ar' => ['required', 'max:255', 'string'],
            'slug' => ['required', 'max:255', 'string', 'unique:posts'],
            'content' => ['required', 'string'],
            'thumbnail' => ['nullable', 'file', 'mimes:png,jpg']
        ];
    }

    public function messages()
    {
        return [
            'title.en.required' => 'The english title is required field.',
            'slug.required' => 'The slug field must be not empty'
        ];
    }
}
