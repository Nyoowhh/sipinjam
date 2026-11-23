<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('alat')?->id;   // null saat create
        
        return [
            'kode'    => ['required', 'string', 'max:20', 'unique:alats,kode'],
            'nama'    => ['required', 'string', 'max:100'],
            'stok'    => ['required', 'integer', 'min:0'],
            'kondisi' => ['required', 'in:baik,rusak ringan,rusak berat'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode alat wajib diisi.',
            'kode.unique'   => 'Kode alat sudah dipakai.',
            'stok.min'      => 'Stok tidak boleh negatif.',
        ];
    }
}
