<x-app-layout>
    @fragment('panel')
        @include('categories.partials.show', ['category' => $category])
    @endfragment
</x-app-layout>
