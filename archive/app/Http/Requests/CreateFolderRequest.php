<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFolderRequest extends FormRequest
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
            'locker_id' => 'required|numeric|min:0',
            'cell_id' => 'required|numeric|min:0'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Пожалуйста заполните поле',
            'title.min' => 'Введите название больше 3ех букв',
            'locker_id.required' => 'Пожалуйста выберите шкафчик',
            'locker_id.numeric|min:0' => 'Пожалуйста выберите шкаф',
            'cell_id.required' => 'Пожалуйста выберите ячейку',
            'cell_id.numeric|min:0' => 'Пожалуйста выберите ячейку',
        ];
    }
}
