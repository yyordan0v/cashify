@props(['account'])

<x-panels.panel padding="4" class="xl:p-8 col-span-2 sm:col-span-1"
                hx-target="this"
                hx-swap="outerHTML">
    <div class="flex items-start flex-col">
        <div class="hidden xl:flex items-center justify-between w-full">
            <x-cards.title class="text-base mt-0 mb-0">
                {{ $account->name }}
            </x-cards.title>
            <div class=" block w-4 h-4 rounded-full {{ $account->color_class }}"></div>
        </div>

        <div class="flex xl:hidden items-center justify-between w-full">
            <div class="flex items-center">
                <div class=" block w-4 h-4 rounded-full mr-4  {{ $account->color_class }}"></div>

                <x-cards.title class="text-base mt-0 mb-0">{{ $account->name }}</x-cards.title>
            </div>

            <x-dropdown.menu>
                <x-dropdown.button>
                    more_vert
                </x-dropdown.button>

                <x-dropdown.body>
                    <x-buttons.action :href="route('accounts.index')">
                        <x-icon style="font-size: 20px">
                            compare_arrows
                        </x-icon>
                        Transfer Balance
                    </x-buttons.action>
                    <x-buttons.action
                        hx-get="{{ route('accounts.edit', $account->id) }}"
                        hx-push-url="true"
                        hx-target="body"
                        hx-swap="outerHTML">
                        <x-icon style="font-size: 20px">
                            edit
                        </x-icon>
                        Edit
                    </x-buttons.action>
                    <form hx-delete="{{route('accounts.destroy', $account->id)}}"
                          hx-target="closest section"
                          hx-swap="delete"
                          hx-confirm="Are you sure you want to delete this account?">
                        @csrf
                        <x-buttons.action class="text-red-600"
                                          type="submit">
                            <x-icon style="font-size: 20px">
                                delete
                            </x-icon>
                            Delete
                        </x-buttons.action>
                    </form>

                </x-dropdown.body>
            </x-dropdown.menu>
        </div>

        <x-cards.title class="mt-4 mb-0">
            {{ Number::currency($account->balance, in: 'BGN', locale: 'bg') }}
        </x-cards.title>

        <x-cards.text class="text-gray-950 text-sm">420 transactions</x-cards.text>
    </div>

    <x-divider class="hidden xl:block"/>

    <div
        class="hidden xl:flex items-center justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">

        <x-buttons.action :href="route('accounts.index')">
            <x-icon>
                compare_arrows
            </x-icon>
            Transfer Balance
        </x-buttons.action>

        <x-buttons.action
            hx-get="{{ route('accounts.edit', $account->id) }}"
            hx-push-url="true"
            hx-target="body"
            hx-swap="outerHTML">
            <x-icon>
                edit
            </x-icon>
            Edit
        </x-buttons.action>
        <form hx-delete="{{route('accounts.destroy', $account->id)}}"
              hx-target="closest section"
              hx-swap="delete"
              hx-confirm="Are you sure you want to delete this account?">
            @csrf
            <x-buttons.action class="text-red-600"
                              type="submit">
                <x-icon>
                    delete
                </x-icon>
                Delete
            </x-buttons.action>
        </form>
    </div>
</x-panels.panel>
