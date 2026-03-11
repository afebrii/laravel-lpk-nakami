<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.kontak.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^62[0-9]{8,15}$/'],
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'website' => 'max:0', // honeypot
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'phone.regex' => 'Nomor WhatsApp harus diawali dengan 62 (contoh: 628...).',
            'subject.required' => 'Subjek wajib diisi.',
            'message.required' => 'Pesan wajib diisi.',
        ]);

        unset($validated['website']);

        // Sanitize phone (keep only digits)
        if ($validated['phone']) {
            $validated['phone'] = preg_replace('/[^0-9]/', '', $validated['phone']);
        }

        Contact::create($validated);

        return back()->with('success', 'Pesan Anda telah terkirim. Tim kami akan segera menghubungi Anda.');
    }
}
