{{-- Breadcrumb Component --}}
{{-- Usage: @include('components.breadcrumb', ['items' => [['label' => 'Beranda', 'url' => '/'], ['label' => 'Program']]]) --}}
@if(isset($items) && count($items) > 0)
<nav aria-label="Breadcrumb" class="mb-6">
    <ol class="flex items-center flex-wrap gap-1 text-sm">
        @foreach($items as $index => $item)
            @if($index > 0)
                <li class="text-dark-gray/40">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
            @endif
            <li>
                @if(isset($item['url']) && $index < count($items) - 1)
                    <a href="{{ url($item['url']) }}" class="text-dark-gray/70 hover:text-rose-gold transition-colors">
                        {{ $item['label'] }}
                    </a>
                @else
                    <span class="text-rose-gold font-medium">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
@endif
