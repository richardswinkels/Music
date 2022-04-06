<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
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
            'year' => 'nullable|integer|digits:4',
            'times_sold' => 'nullable|integer|min:0|max:2147483647',
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
            'year.integer' => 'Het jaar moet een geheel getal zijn!',
            'year.digits' => 'Het jaar moet een viercijferig getal zijn!',
            'times_sold.integer' => 'Aantal keer verkocht moet een geheel getal zijn!',
            'times_sold.min' => 'Aantal keer verkocht moet een positief getal zijn!',
            'times_sold.max' => 'Maximumwaarde aantal keer verkocht overschreden!',
        ];
    }
}
