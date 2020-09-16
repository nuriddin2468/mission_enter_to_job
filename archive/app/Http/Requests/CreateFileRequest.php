<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFileRequest extends FormRequest
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
            'title' => 'required|min:3',
            'description' => '',
            'path' => 'required|file|max:100000',
            'path.*' => 'mimetypes:application/pdf,text/plain',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Пожалуйста заполните поля',
            'title.min' => 'Введите название больше 3ех букв',
            'path.required' => 'Пожалуйста выберите файл (txt,pdf)'
        ];
    }
}
