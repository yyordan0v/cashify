@if (session('error'))
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1 my-2']) }}>
        <li>{{ session('error') }}</li>
    </ul>
@endif
