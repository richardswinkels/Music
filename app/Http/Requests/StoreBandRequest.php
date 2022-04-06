<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBandRequest extends FormRequest
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
            'name' => 'required',
            'genre' => 'required',
            'founded' => 'required|integer|digits:4',
            'active_till' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'De naam ontbreekt!',
            'genre.required' => 'Het genre ontbreekt!',
            'founded.required' => 'Het oprichtingsjaar ontbreekt!',
            'founded.integer' => 'Het oprichtingsjaar moet een geheel getal zijn!',
            'founded.digits' => 'Het oprichtingsjaar moet een viercijferig getal zijn!',
            'active_till.required' => 'Actief tot ontbreekt!',
        ];
    }
}
