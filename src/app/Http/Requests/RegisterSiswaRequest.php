<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterSiswaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'asal_sekolah' => 'nullable',
            'agama' => 'nullable',
            'nilai_ind' => 'nullable',
            'nilai_ipa' => 'nullable',
            'nilai_mtk' => 'nullable',
            'total_nilai' => 'nullable',
        ];
    }
}
