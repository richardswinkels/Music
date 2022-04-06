<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAlbumSongRequest extends FormRequest
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
            'song' => [ 'required',
            Rule::unique('album_song', 'song_id')->where(function ($q) {return $q->where('album_id', $this->route()->parameter('album_id')); }),
            ]
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
            'song.required' => 'Nummer ontbreekt!',
            'song.unique' => 'Kan niet hetzelfde nummer toevoegen!',
        ];
    }
}
