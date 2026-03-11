<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $allSettings = Setting::all();

        foreach ($allSettings as $setting) {
            $key = $setting->key;

            if ($setting->type === 'image') {
                if ($request->hasFile("settings.{$key}")) {
                    $request->validate([
                        "settings.{$key}" => 'image|max:2048',
                    ]);

                    // Delete old file
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }

                    $path = $request->file("settings.{$key}")->store('settings', 'public');
                    $setting->update(['value' => $path]);
                }
            } else {
                if ($request->has("settings.{$key}")) {
                    $setting->update(['value' => $request->input("settings.{$key}")]);
                }
            }
        }

        Cache::forget('settings');

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
