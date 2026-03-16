<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::with('program:id,name');

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('program')) {
            $query->where('program_id', $request->program);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('ref_code', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $registrations = $query->latest()->paginate(15)->appends($request->query());
        $programs = Program::orderBy('name')->get(['id', 'name']);

        return view('admin.registrations.index', compact('registrations', 'programs'));
    }

    public function show(Registration $registration)
    {
        $registration->load('program');
        return view('admin.registrations.show', compact('registration'));
    }

    public function updateStatus(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,rejected,completed',
            'admin_notes' => 'nullable|max:1000',
        ]);

        $registration->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'] ?? $registration->admin_notes,
            'confirmed_at' => $validated['status'] === 'confirmed' ? now() : $registration->confirmed_at,
        ]);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();

        return back()->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
