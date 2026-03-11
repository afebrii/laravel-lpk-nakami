<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Program;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        $programs = Program::with('category')
            ->active()
            ->ordered()
            ->get();

        return view('pages.daftar.index', compact('programs'));
    }

    public function store(StoreRegistrationRequest $request)
    {
        $data = $request->validated();

        // Remove honeypot and agreement fields
        unset($data['website'], $data['agreement']);

        // Sanitize phone numbers (keep only digits)
        $data['phone'] = preg_replace('/[^0-9]/', '', $data['phone']);
        if (isset($data['mother_phone'])) {
            $data['mother_phone'] = preg_replace('/[^0-9]/', '', $data['mother_phone']);
        }

        // Generate ref code
        $data['ref_code'] = Registration::generateRefCode();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('registrations', 'public');
        }

        Registration::create($data);

        return redirect()
            ->route('sukses-daftar')
            ->with('ref_code', $data['ref_code'])
            ->with('reg_type', $data['type']);
    }

    public function success()
    {
        if (!session('ref_code')) {
            return redirect()->route('daftar');
        }

        return view('pages.daftar.sukses');
    }
}
