<?php

namespace App\Http\Requests\Kelas;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class KelasRequest extends FormRequest
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
        $kelasId = $this->route('kelas') ? $this->route('kelas')->id : null;
        return [
            'nama_kelas' => [
                'required',
                'min:1',
                Rule::unique('kelas', 'nama_kelas')->ignore($kelasId),
            ],
            'jurusan_id' => [
                'required',
                Rule::exists('jurusan', 'id')
            ],
            'wali_kelas_id' => [
                'required',
                Rule::exists('wali_kelas', 'id')
            ]
        ];
    }
    public function attributes()
    {
        return [
            'nama_kelas' => 'nama kelas',
            'jurusan_id' => 'jurusan',
            'wali_kelas_id' => 'wali kelas'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'unique' => ':attribute sudah ada',
            'exists' => ':attribute tidak ditemukan'
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
