<?php

namespace App\Http\Requests\V1\API\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name'          => ['required', 'string', 'max:255'],
            'email'              => ['required', 'email', 'unique:customers,email'],
            'phone'              => ['nullable', 'string', 'max:20'],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/[A-Z]/',      // minimal 1 huruf besar
                'regex:/[0-9]/',      // minimal 1 angka
                'regex:/[@$!%*#?&]/', // minimal 1 simbol spesial
            ],
            'gender'             => ['nullable', 'in:Laki-laki,Perempuan'],
            'address'            => ['nullable', 'string'],
            'certificate_address' => ['nullable', 'string'],
            'company'            => ['nullable', 'string', 'max:255'],
            'profile_photo'      => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // kalau upload file, nanti bisa pakai image|mimes
        ];
    }
}
