<span {{ $attributes->merge(['class' => 'material-symbols-rounded']) }}>
    {{ $slot }}
    <div class="sr-only">{{ $slot }}</div>
</span>
