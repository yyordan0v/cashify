@props([
    'categories'
])

<x-modal name="filter-transactions" maxWidth="2xl" :show="$errors->userDeletion->isNotEmpty()">
    <div class="flex flex-col space-y-6 p-6">

        <x-panels.heading>
            {{ __('Filters') }}
        </x-panels.heading>

        <form action="{{ route('transactions.index') }}" method="GET">
            <x-forms.radio.group type="category">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <x-forms.radio.category :id="$category->id"
                                                name="categories[]"
                                                :color="$category->color_class"
                                                :categoryColor="$category->color"
                                                :image="$category->icon"
                                                :checked="in_array($category->id, request('categories', []))"
                                                type="checkbox">
                            {{ $category->name }}
                        </x-forms.radio.category>
                    @endforeach
                @else
                    <x-panels.heading class="text-sm text-center w-full">
                        No expense categories found.
                    </x-panels.heading>
                @endif
            </x-forms.radio.group>

            <x-divider/>

            <div class="flex items-center justify-end gap-2">
                <x-buttons.secondary x-on:click="$dispatch('close')">Cancel</x-buttons.secondary>
                <x-buttons.form>Apply</x-buttons.form>
            </div>
        </form>


    </div>
</x-modal>
