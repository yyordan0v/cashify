@props(['account'])

<x-panels.panel class="flex flex-col items-start lg:items-center justify-center lg:min-h-[255px]"
                hx-target="this"
                hx-swap="outerHTML"
>
    <div class="flex items-center justify-between lg:justify-center w-full">
        <x-cards.title class="mb-0 mt-0 lg:mt-4">
                    <span class="font-bold text-xl">
                            {{ $account->name }}
                    </span>
        </x-cards.title>

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
                <x-buttons.action hx-get="{{ route('accounts.edit', $account) }}">
                    <x-icon style="font-size: 20px">
                        edit
                    </x-icon>
                    Edit
                </x-buttons.action>
                <form hx-delete="{{route('accounts.destroy', $account->id)}}"
                      hx-target="closest section"
                      hx-swap="delete"
                      hx-confirm="Are you sure?"
                >
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

    <div class="flex flex-col items-start lg:items-center">
        <x-cards.text
            class="mt-0 lg:mt-2">{{ Number::currency($account->balance, in: 'BGN', locale: 'bg') }}</x-cards.text>
        <x-cards.text class="my-0 text-xs">4 transactions</x-cards.text>
    </div>

    <x-divider class="hidden lg:block my-6 w-full"/>

    <div
        class="hidden lg:flex items-center justify-center w-full gap-2 text-gray-600 dark:text-gray-400 text-sm">


        <x-buttons.action :href="route('accounts.index')">
            <x-icon>
                compare_arrows
            </x-icon>
            Transfer Balance
        </x-buttons.action>
        <x-buttons.action hx-get="{{ route('accounts.edit', $account->id) }}"
        >
            <x-icon>
                edit
            </x-icon>
            Edit
        </x-buttons.action>
        <form hx-delete="{{route('accounts.destroy', $account->id)}}"
              hx-target="closest section"
              hx-swap="delete"
              hx-confirm="Are you sure?"
        >
            @csrf
            @method('delete')
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

