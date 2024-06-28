@props(['title'])

<h6 {{ $attributes->merge(['class' => 'mb-1 text-sm leading-normal dark:text-white text-black truncate']) }} title="{{ $title }}">{{ $title }}</h6>
