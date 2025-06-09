<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return bool
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $credentials = $this->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $this->session()->regenerate();
            return true;
        }

        throw ValidationException::withMessages([
            'username' => __('auth.failed'),
        ]);
    }
}