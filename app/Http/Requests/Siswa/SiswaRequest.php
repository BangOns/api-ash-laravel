<?php

namespace App\Http\Requests\Siswa;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SiswaRequest extends FormRequest
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
            'nama_siswa' => [
                'required',
                'min:3',
                'max:50'
            ],
            'kelas_id' => [
                'required',
                Rule::exists('kelas', 'id')->where(function ($query) {
                    if ($this->kelas_id) {
                        $query->where('id', $this->kelas_id);
                    }
                })
            ],
            'jurusan_id' => [
                'required',
                Rule::exists('jurusan', 'id')->where(function ($query) {
                    if ($this->jurusan_id) {
                        $query->where('id', $this->jurusan_id);
                    }
                }),
            ],
            'jkl' => [
                'required',
                'in:L,P'
            ]
        ];
    }
    public function attributes()
    {
        return [
            'nama_siswa' => 'nama siswa',
            'kelas_id' => 'kelas',
            'jurusan_id' => 'jurusan',
            'jkl' => 'jenis kelamin'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'exists' => ':attribute tidak ditemukan',
            'in' => ':attribute harus salah satu dari :values'
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
