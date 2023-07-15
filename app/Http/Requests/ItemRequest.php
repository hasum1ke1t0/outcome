<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'item.name' => 'required|string|max:100',
            'item.course' => 'required|string|max:50',
            'item.create_year' => 'required|integer|max:2023|min:1950',
            'item.body' => 'required|string|max:300',
        ];
    }
}
