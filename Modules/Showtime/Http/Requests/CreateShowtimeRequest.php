<?php

namespace Modules\Showtime\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShowtimeRequest extends FormRequest
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
            'cinema_id' => 'required|integer',
            'movie_id' => 'required|integer',
            'time' => 'required|date|after:1 hour',
        ];
    }
}
