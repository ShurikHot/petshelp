<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|min:2',
            'age_month' => 'required|integer',
            'species' => 'required|in:"Собака", "Кіт", "Гризун", "Пташка", "Інше"',
            'sex' => 'required|in:"Самець","Самиця"',
            'breed' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'city' => 'required|string|max:255|min:2',
            'phone_number' => 'required|string|size:13', // !!!формат +380987654321
            'story' => 'nullable|string|max:500',
            'peculiarities' => 'nullable|string|max:255',
            'wishes' => 'nullable|string|max:255',
            'patrons' => 'nullable|string',
        ];
    }
}
