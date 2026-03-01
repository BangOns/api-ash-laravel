<?php

namespace App\Http\Requests\Jurusan;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class JurusanRequest extends FormRequest
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
            'nama_jurusan' => [
                'required',
                'min:3',
                Rule::unique('jurusan', 'nama_jurusan')
            ]
        ];
    }
    public function attributes()
    {
        return [
            'nama_jurusan' => 'nama jurusan'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'unique' => ':attribute sudah ada'
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
