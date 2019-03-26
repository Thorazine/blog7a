<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class PageUpdate extends FormRequest
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
            'slug' => 'required|unique:pages,slug,'.Request::get('id').'|max:100',
            'image' => '',
            'title' => 'required|max:100',
            'body' => 'required|max:65000',
            'active' => 'boolean',
        ];
    }
}
