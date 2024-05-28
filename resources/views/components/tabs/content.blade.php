@props(['type' =>'default'])

@if($type === 'default')
    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" x-cloak
        {{ $attributes->merge(['class' => 'relative w-full']) }}
    >
        {{ $slot }}
    </div>
@elseif($type === 'htmx')
    <div {{ $attributes->merge(['class' => 'relative w-full']) }}>
        {{ $slot }}
    </div>
@endif



