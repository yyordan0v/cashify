@props(['newRoute'])

<x-buttons.secondary hx-post="{{ route('cancel') }}" hx-swap="outerHTML"
                     hx-push-url="{{ $newRoute }}" hx-params="_token"
>
    Cancel
</x-buttons.secondary>


