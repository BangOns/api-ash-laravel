<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => ['required', 'email',  Rule::unique('users', 'email')],
            'password' => 'required|min:6',
            'role' => 'required|in:admin,guru,siswa'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nama',
            'email' => 'email',
            'password' => 'password',
            'role' => 'role',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi',
            'email' => ':attribute harus berupa email yang valid',
            'min' => 'tidak boleh kurang dari :min',
            'in' => 'tidak boleh beda dari admin, guru, siswa',
            'unique' => 'tidak boleh sama dengan yang sudah ada'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => false,
            'message' => 'Validasi gagal',
            'errors' => $validator->errors()
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
