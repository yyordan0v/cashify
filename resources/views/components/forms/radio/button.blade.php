@props([
    'name',
    'id',
    'value',
    'checked' => false,
    'disabled' => false,
    'type' => 'radio'
])

<li>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
           class="hidden peer" {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}/>
    <label for="{{ $id }}"
           class="inline-flex items-center justify-center w-full p-1.5 shadow-sm border rounded-lg cursor-pointer transition-colors duration-200 text-gray-500 dark:text-gray-400 bg-transparent dark:dark:bg-neutral-900/50 border-gray-300 dark:border-gray-500 peer-checked:text-gray-600 dark:peer-checked:text-gray-200 peer-checked:bg-white dark:peer-checked:bg-gray-700 peer-checked:border-gray-600 dark:peer-checked:border-gray-700 hover:text-gray-600 dark:hover:text-gray-200 hover:border-gray-400 hover:bg-white/40 hover:dark:bg-gray-700/50 peer-disabled:opacity-50">
        {{ $slot }}
    </label>
</li>
