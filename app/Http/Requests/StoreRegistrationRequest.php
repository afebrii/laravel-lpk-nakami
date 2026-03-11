<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'type' => 'required|in:konsultasi,pelatihan',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'program_id' => 'required|exists:programs,id',
            'message' => 'nullable|string|max:1000',
            'website' => 'max:0', // honeypot
        ];

        if ($this->input('type') === 'pelatihan') {
            $rules = array_merge($rules, [
                'email' => 'required|email|max:255',
                'dob' => 'required|date|before:today',
                'gender' => 'required|in:L,P',
                'address' => 'required|string|max:500',
                'last_education' => 'required|string|max:50',
                'occupation' => 'required|string|max:100',
                'mother_phone' => 'required|string|max:20',
                'motivation' => 'required|string|max:1000',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'agreement' => 'required|accepted',
            ]);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
            'email.required' => 'Email wajib diisi untuk pendaftaran pelatihan.',
            'email.email' => 'Format email tidak valid.',
            'program_id.required' => 'Silakan pilih program.',
            'program_id.exists' => 'Program yang dipilih tidak valid.',
            'dob.required' => 'Tanggal lahir wajib diisi.',
            'dob.before' => 'Tanggal lahir harus sebelum hari ini.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'address.required' => 'Alamat wajib diisi.',
            'last_education.required' => 'Pendidikan terakhir wajib diisi.',
            'occupation.required' => 'Pekerjaan wajib diisi.',
            'mother_phone.required' => 'Nomor HP ibu/wali wajib diisi.',
            'motivation.required' => 'Motivasi wajib diisi.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format foto harus JPG atau PNG.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
            'agreement.required' => 'Anda harus menyetujui syarat & ketentuan.',
            'agreement.accepted' => 'Anda harus menyetujui syarat & ketentuan.',
            'website.max' => 'Spam detected.',
        ];
    }
}
