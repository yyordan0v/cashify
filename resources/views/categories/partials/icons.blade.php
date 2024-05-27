@foreach($icons as $icon)
    <x-forms.radio.icon
        name="icon"
        id="{{ pathinfo($icon, PATHINFO_FILENAME) }}"
        icon="{{ $icon }}"
        :checked="false"/>
@endforeach
