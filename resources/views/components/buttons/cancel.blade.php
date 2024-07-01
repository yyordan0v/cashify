@props(['to', 'id', 'keep' => false])

@if($keep)
    <x-buttons.secondary
        hx-get="{{ route($to.'.show', $id) }}"
        hx-push-url="{{ route($to.'.index') }}"
        hx-target="closest form"
        hx-swap="outerHTML">
        {{__('Cancel')}}
    </x-buttons.secondary>
@else
    <x-buttons.secondary hx-post="{{ route('cancel') }}" hx-swap="outerHTML"
                         hx-push-url="{{ route($to.'.index') }}" hx-params="_token">
        {{__('Cancel')}}
    </x-buttons.secondary>
@endif






