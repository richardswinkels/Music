<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSongAlbumRequest extends FormRequest
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
            'album' => [ 'required',
            Rule::unique('album_song', 'album_id')->where(function ($q) {return $q->where('song_id', $this->route()->parameter('song_id')); }),
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
            'album.required' => 'Album ontbreekt!',
            'album.unique' => 'Kan niet hetzelfde album toevoegen!',
        ];
    }
}
