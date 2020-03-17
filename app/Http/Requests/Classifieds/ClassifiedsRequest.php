<?php

namespace App\Http\Requests\Classifieds;

use Illuminate\Foundation\Http\FormRequest;

class ClassifiedsRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'title' => 'required|string|min:4|max:255',
            'content' => 'required|min:15',
            'contact_person' => 'required|string|min:3',
            'email' => 'required|email',
            'type' => 'required',
            'is_negotiation' => 'required',
            'is_reservation' => 'required',
            'state' => 'required'
        ];
    }
}
