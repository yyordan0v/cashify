<div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" x-cloak
    {{ $attributes->merge(['class' => 'relative w-full']) }}
>
    {{ $slot }}
</div>



