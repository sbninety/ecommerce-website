<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
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
        return [
            'username' => [
                'nullable',
                'max:255'
            ],
            'phone' => [
                'nullable',
                'numeric'
            ],
            'gender' => [
                'nullable'
            ],
            'name' => [
                'required',
                'max:255'
            ],
            'city_id' => [
                'required'
            ],
            'district_id' => [
                'required'
            ],
            'address' => [
                'required',
                'max:255'
            ],
            'image' => [
                'nullable',
                'mimes:jpg,jpeg,png',
                'max:1000'
            ]
        ];
    }
}
