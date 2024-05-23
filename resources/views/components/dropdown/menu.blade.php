<div {{ $attributes->merge(['class' => 'xl:hidden']) }} x-data="{ dropdownOpen: false }">
    {{ $slot }}
</div>
