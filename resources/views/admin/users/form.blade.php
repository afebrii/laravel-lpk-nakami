@extends('layouts.admin')

@section('title', isset($user) ? 'Edit User' : 'Tambah User')
@section('page_title', isset($user) ? 'Edit User' : 'Tambah User')

@section('content')
<div class="max-w-lg">
    <form method="POST" action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
        @csrf
        @if(isset($user)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Nama *</label>
            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Email *</label>
            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Role *</label>
            <select name="role" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                <option value="staff" {{ old('role', $user->role ?? 'staff') == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="superadmin" {{ old('role', $user->role ?? '') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Password {{ isset($user) ? '' : '*' }}</label>
                <input type="password" name="password" {{ isset($user) ? '' : 'required' }} minlength="8" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
                @if(isset($user))<p class="text-xs text-dark-gray/50 mt-1">Kosongkan jika tidak diubah</p>@endif
                @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-#C0001E/30">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-charcoal mb-1">Foto Profil</label>
            @if(isset($user) && $user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" class="w-16 h-16 object-cover rounded-full mb-2" alt="">
            @endif
            <input type="file" name="avatar" accept="image/*" class="w-full text-sm text-dark-gray file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-#C0001E/10 file:text-#C0001E">
            <p class="text-xs text-dark-gray/50 mt-1">JPG/PNG, maksimal 2MB</p>
            @error('avatar') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $user->is_active ?? true) ? 'checked' : '' }}
                       class="w-4 h-4 rounded border-gray-300 text-#C0001E focus:ring-#C0001E/30">
                <span class="text-sm text-dark-gray">Aktif</span>
            </label>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-#C0001E text-white text-sm font-semibold rounded-xl hover:bg-#C0001E-dark transition-colors">
                {{ isset($user) ? 'Simpan' : 'Tambah User' }}
            </button>
            <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 border border-gray-200 text-sm rounded-xl hover:bg-gray-50">Batal</a>
        </div>
    </form>
</div>
@endsection
