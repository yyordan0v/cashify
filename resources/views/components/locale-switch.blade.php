@php
    $currentLocale = app()->getLocale();
    $locales = [
        'en' => [
            'name' => 'English',
            'flag' => asset('images/flags/gb.svg')
        ],
        'bg' => [
            'name' => 'Bulgarian',
            'flag' => asset('images/flags/bg.svg')
        ]
    ];
@endphp

<div class="absolute bottom-2 right-0 w-full">
    <div x-data="{ dropdownOpen: false }" class="relative">
        <button @click="dropdownOpen=true"
                class="w-full inline-flex items-center justify-start h-12 py-2 px-4 text-sm font-medium transition-colors disabled:pointer-events-none">
            <img class="w-6 h-6 mr-2 rounded-full" alt="Flag of {{ __($locales[$currentLocale]['name']) }}"
                 src="{{ $locales[$currentLocale]['flag'] }}">
            <span
                class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px text-gray-900 dark:text-white">
                <span>{{__('Language')}}</span>
                <span class="text-xs font-light text-neutral-500">{{ __($locales[$currentLocale]['name']) }}</span>
            </span>
        </button>

        <div x-show="dropdownOpen"
             @click.away="dropdownOpen=false"
             x-transition:enter="ease-out duration-200"
             x-transition:enter-start="translate-y-2"
             x-transition:enter-end="translate-y-0"
             class="absolute bottom-0 z-50 w-56 mb-14 -translate-x-1/2 left-1/2"
             x-cloak>
            <div
                class="p-1 rounded-md border bg-white/20 border-neutral-400/50 dark:border-neutral-600/50 dark:bg-neutral-900/20 text-neutral-700 dark:text-neutral-200 space-y-1">
                @foreach($locales as $code => $locale)
                    <a href="{{ route('language.switch', $code) }}"
                       class="relative flex cursor-pointer select-none hover:bg-gray-200 hover:dark:bg-gray-700 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50 {{ $currentLocale === $code ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                        <img class="w-4 h-4 mr-2 rounded-full" width="24" height="24"
                             alt="Flag of {{ __($locale['name']) }}"
                             src="{{ $locale['flag'] }}">
                        <span>{{ __($locale['name']) }}</span>
                        @if($currentLocale === $code)
                            <svg class="ml-auto h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                      clip-rule="evenodd"/>
                            </svg>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
