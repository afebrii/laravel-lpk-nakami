<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LowonganRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'nullable|string',
            'persyaratan' => 'nullable|string',
            'status' => 'required|in:Buka,Tutup',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];

        return $rules;
    }
}
