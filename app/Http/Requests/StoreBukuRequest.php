<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $buku = $this->route('buku');

        return [
            'isbn'         => ['required', 'string', 'max:20', Rule::unique('bukus', 'isbn')->ignore($buku)],
            'judul'        => ['required', 'string', 'min:3', 'max:255'],
            'penulis'      => ['required', 'string', 'max:100'],
            'tahun_terbit' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'stok'         => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'isbn.required'         => 'ISBN wajib diisi.',
            'isbn.unique'           => 'ISBN ini sudah terdaftar.',
            'judul.required'        => 'Judul buku wajib diisi.',
            'judul.min'             => 'Judul buku minimal 3 karakter.',
            'penulis.required'      => 'Nama penulis wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.min'      => 'Tahun terbit minimal 1900.',
            'stok.min'              => 'Stok tidak boleh negatif.',
        ];
    }
}
