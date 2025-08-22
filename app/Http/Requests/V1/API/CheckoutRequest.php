<?php

namespace App\Http\Requests\V1\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;

class CheckoutRequest extends FormRequest
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

    public function prepareForValidation(): void
    {
        if ($this->has('training_id')) {
            try {
                $this->merge([
                    'training_id' => decrypt($this->input('training_id'))
                ]);
            } catch (\Exception $e) {
                // Kalau decrypt gagal, paksa biar validation gagal
                $this->merge([
                    'training_id' => null
                ]);
            }
        }
    }


    public function rules(): array
    {
        return [
            'training_id'         => ['required', 'exists:trainings,id'],
            'price'               => ['required', 'numeric', 'min:0'],

            // Data peserta
            'user_name'           => ['required', 'string', 'max:255'],
            'user_email'          => ['required', 'email', 'max:255'],
            'user_phone'          => ['required', 'string', 'max:20'],
            'certificate_address' => ['required', 'string'],
            'company'             => ['nullable', 'string', 'max:255'],
            'gender'              => ['required', 'in:Laki-laki,Perempuan'],

        ];
    }
}
