<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UserSaveRequest extends FormRequest
{

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'id_number' => 'required|numeric',
            'dob' => 'required',
            'language' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($this->user_id),
            ],
            'phone_no' => 'required|numeric',
        ];
    }
}
