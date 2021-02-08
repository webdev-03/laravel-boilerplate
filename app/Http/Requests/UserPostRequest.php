<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|min:3|max:15',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8',
            'role.*' => 'required|exists:roles,id',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $user = $this->route()->parameter('user');

            $rules['email'] = [
                'required',
                'email',
                Rule::unique('users')->ignore($user),
            ];
            $rules['password'] = [
                'sometimes',
            ];
        }

        return $rules;
    }
}