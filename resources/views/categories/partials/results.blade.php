@foreach($categories as $category)
    @include('categories.partials.show', ['category' => $category])
@endforeach
