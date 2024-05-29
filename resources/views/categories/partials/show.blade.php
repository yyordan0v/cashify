@props(['category'])
<div hx-target="this">
    <x-panels.panel padding="4">
        <div class="flex items-center">

            <x-category-image image="{{ $category->icon }}"
                              color="{{ $category->color_class }}"/>

            <div class="w-full pb-2">
                <div class="flex items-center justify-between">
                    <x-cards.title class="mt-0 mb-0">
                                    <span class="font-black">
                                        {{ $category->name }}
                                    </span>
                    </x-cards.title>

                    <x-dropdown.menu>
                        <x-dropdown.button>
                            more_vert
                        </x-dropdown.button>

                        <x-dropdown.body>
                            <x-buttons.action hx-get="{{ route('categories.edit', $category->id) }}"
                                              hx-push-url="true"
                                              hx-swap="outerHTML"
                                              class="w-full">
                                <x-icon style="font-size: 20px">
                                    edit
                                </x-icon>
                                Edit
                            </x-buttons.action>
                            <x-buttons.action x-data=""
                                              x-on:click.prevent="$dispatch('open-modal', 'confirm-category-{{ $category->id }}-deletion')"
                                              class="text-red-600 w-full">
                                <x-icon style="font-size: 20px">
                                    delete
                                </x-icon>
                                Delete
                            </x-buttons.action>
                        </x-dropdown.body>
                    </x-dropdown.menu>

                    <div
                        class="hidden xl:flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm">
                        <x-buttons.action hx-get="{{ route('categories.edit', $category->id) }}"
                                          hx-push-url="true"
                                          hx-swap="outerHTML">
                            <x-icon>
                                edit
                            </x-icon>
                            Edit
                        </x-buttons.action>
                        <x-buttons.action class="text-red-600"
                                          x-data=""
                                          x-on:click.prevent="$dispatch('open-modal', 'confirm-category-{{ $category->id }}-deletion')">
                            <x-icon>
                                delete
                            </x-icon>
                            Delete
                        </x-buttons.action>
                    </div>
                </div>

                <div class="flex flex-col items-start">
                    <x-cards.text
                        class="my-0 text-sm">{{ ucwords($category->type) }}</x-cards.text>
                    <x-cards.text class="my-0 text-xs">4 transactions</x-cards.text>
                </div>
            </div>
        </div>
    </x-panels.panel>

    <x-modal name="confirm-category-{{ $category->id }}-deletion">
        <form hx-delete="{{ route('categories.destroy', $category->id) }}" hx-swap="outerHTML"
              hx-push-url="{{ route('categories.index') }}"
              class="p-6">
            @csrf

            <x-panels.heading>
                {{ __('Are you sure you want to delete your category?') }}
            </x-panels.heading>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Once your category is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your category.') }}
            </p>

            <div class="mt-6 flex flex-col md:flex-row items-center justify-end w-full gap-2">
                <x-buttons.secondary x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-buttons.secondary>

                <x-buttons.danger x-on:click="$dispatch('close')">
                    {{ __('Delete Category') }}
                </x-buttons.danger>
            </div>
        </form>
    </x-modal>
</div>
