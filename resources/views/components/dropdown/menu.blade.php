<div {{ $attributes->merge(['class' => 'lg:hidden']) }} x-data="{ dropdownOpen: false }">
    {{ $slot }}
</div>
