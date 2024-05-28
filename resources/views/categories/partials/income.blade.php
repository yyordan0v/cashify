<x-tabs.content class="flex flex-col gap-4" type="htmx">
    <x-forms.search>
        <form>
            @csrf
            <x-forms.input class="w-full" style="margin-top: 0 !important"
                           placeholder="Search your categories..."
                           name="search" autofocus
                           hx-post="{{ route('categories.searchCategories', 'income') }}"
                           hx-trigger="input changed delay:300ms, search"
                           hx-target="#list"/>
        </form>
    </x-forms.search>

    @if(count($incomeCategories) > 0)
        <div id="list" class="flex flex-col gap-4">
            @foreach($incomeCategories as $category)
                @include('categories.partials.show', ['category' => $category])
            @endforeach
        </div>
    @else
        <x-panels.panel padding="4">
            <x-panels.heading class="text-center w-full">No income categories found.</x-panels.heading>
        </x-panels.panel>
    @endif
</x-tabs.content>
