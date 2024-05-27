@props(['category'])

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
                                          hx-target="this"
                                          hx-swap="outerHTML">
                            <x-icon style="font-size: 20px">
                                edit
                            </x-icon>
                            Edit
                        </x-buttons.action>
                        <x-buttons.action :href="route('categories.index')"
                                          class="text-red-600">
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
                                      hx-target="closest section"
                                      hx-swap="outerHTML">
                        <x-icon>
                            edit
                        </x-icon>
                        Edit
                    </x-buttons.action>
                    <x-buttons.action :href="route('categories.index')" class="text-red-600">
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
