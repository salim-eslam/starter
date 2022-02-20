<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name_en' => 'Required|max:100|unique:offers,name_en',
            'name_ar' => 'Required|max:100|unique:offers,name_ar',
            'price' => 'Numeric|Required',
            'details_en' => 'Required',
            'details_ar' => 'Required',

        ];
    }
}
