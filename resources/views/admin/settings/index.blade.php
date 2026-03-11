@extends('layouts.admin')

@section('title', 'Pengaturan Umum')
@section('page_title', 'Pengaturan Umum')

@section('content')
<div x-data="{ activeTab: '{{ array_keys($settings->toArray())[0] ?? 'identitas' }}' }">
    {{-- Tabs --}}
    <div class="bg-white rounded-xl border border-gray-200 mb-6">
        <div class="flex flex-wrap border-b border-gray-200">
            @php
                $tabLabels = [
                    'identitas' => 'Identitas',
                    'kontak' => 'Kontak',
                    'sosial' => 'Media Sosial',
                    'seo' => 'SEO',
                    'beranda' => 'Konten Beranda',
                ];
            @endphp
            @foreach($tabLabels as $tabKey => $tabLabel)
                @if(isset($settings[$tabKey]))
                <button @click="activeTab = '{{ $tabKey }}'"
                        :class="activeTab === '{{ $tabKey }}' ? 'border-rose-gold text-rose-gold' : 'border-transparent text-dark-gray hover:text-charcoal'"
                        class="px-4 py-3 text-sm font-medium border-b-2 transition-colors -mb-px">
                    {{ $tabLabel }}
                </button>
                @endif
            @endforeach
        </div>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @foreach($settings as $group => $items)
        <div x-show="activeTab === '{{ $group }}'" x-transition class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <h3 class="text-base font-semibold text-charcoal mb-4">{{ $tabLabels[$group] ?? ucfirst($group) }}</h3>

            @foreach($items as $setting)
            <div>
                <label class="block text-sm font-medium text-charcoal mb-1">{{ $setting['label'] }}</label>

                @if($setting['type'] === 'text')
                    <input type="text" name="settings[{{ $setting['key'] }}]" value="{{ $setting['value'] }}"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">

                @elseif($setting['type'] === 'textarea')
                    <textarea name="settings[{{ $setting['key'] }}]" rows="3"
                              class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">{{ $setting['value'] }}</textarea>

                @elseif($setting['type'] === 'number')
                    <input type="number" name="settings[{{ $setting['key'] }}]" value="{{ $setting['value'] }}"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-rose-gold/30">

                @elseif($setting['type'] === 'image')
                    @if($setting['value'])
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $setting['value']) }}" class="h-16 object-contain rounded-lg border" alt="">
                        </div>
                    @endif
                    <input type="file" name="settings[{{ $setting['key'] }}]" accept="image/*"
                           class="w-full text-sm text-dark-gray file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-rose-gold/10 file:text-rose-gold">
                    <p class="text-xs text-dark-gray/50 mt-1">JPG/PNG, maksimal 2MB</p>
                @endif
            </div>
            @endforeach

            <div class="pt-2">
                <button type="submit" class="px-6 py-2.5 bg-rose-gold text-white text-sm font-semibold rounded-xl hover:bg-rose-gold-dark transition-colors">
                    Simpan Pengaturan
                </button>
            </div>
        </div>
        @endforeach
    </form>
</div>
@endsection
