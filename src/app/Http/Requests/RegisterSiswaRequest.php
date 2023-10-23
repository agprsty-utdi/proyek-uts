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
            'no_pendaftaran' => 'required|digits:6',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'asal_sekolah' => 'required',
            'agama' => 'required',
            'nilai_ind' => 'required',
            'nilai_ipa' => 'required',
            'nilai_mtk' => 'required',
            'total_nilai' => 'required',
        ];
    }
}
