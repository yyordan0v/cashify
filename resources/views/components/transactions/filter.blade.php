@props([
    'categories'
])

<x-modal name="filter-transactions" maxWidth="xl" :show="$errors->userDeletion->isNotEmpty()">
    <div class="flex flex-col space-y-6 p-6">

        <x-panels.heading>
            {{ __('Filters') }}
        </x-panels.heading>

        <x-forms.radio.group type="category" x-data="{ selectedCategory: null }">
            @if(count($categories) > 0)
                <x-forms.radio.category id="all"
                                        name="category_id"
                                        color="bg-gray-200"
                                        categoryColor="gray"
                                        image="image"
                                        type="checkbox"
                                        x-model="selectedCategory"
                                        value="all"
                                        :checked="true"
                                        @change="selectedCategory = $event.target.checked ? 'all' : null">
                    All
                </x-forms.radio.category>
                @foreach($categories as $category)
                    <x-forms.radio.category :id="$category->id"
                                            name="category_id"
                                            :color="$category->color_class"
                                            :categoryColor="$category->color"
                                            :image="$category->icon"
                                            type="checkbox"
                                            x-model="selectedCategory"
                                            @change="if ($event.target.checked) { selectedCategory = '{{ $category->id }}'; } else if (selectedCategory === 'all') { selectedCategory = null; }">
                        {{ $category->name }}
                    </x-forms.radio.category>
                @endforeach
            @else
                <x-panels.heading class="text-sm text-center w-full">
                    No expense categories found.
                </x-panels.heading>
            @endif
        </x-forms.radio.group>


        <x-forms.date/>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>

            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>
            <div
                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
            ></div>
        </div>

        <div class="flex items-center justify-end gap-2">
            <x-buttons.secondary x-on:click="$dispatch('close')">Cancel</x-buttons.secondary>
            <x-buttons.form>Apply</x-buttons.form>
        </div>

    </div>
</x-modal>
