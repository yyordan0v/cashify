@props(['account'])

<x-panels.panel padding="p-4" class="xl:p-8 col-span-2 sm:col-span-1">
    <div class="flex items-start flex-col">
        <div class="hidden xl:flex items-center justify-between w-full">
            <x-cards.title class="text-base mt-0 mb-0">
                {{ $account->name }}
            </x-cards.title>
            <div class=" block w-4 h-4 rounded-full {{ $account->color_class }}"></div>
        </div>

        <div class="flex xl:hidden items-center justify-between w-full">
            <div class="flex items-center">
                <div class="block w-4 h-4 rounded-full mr-4  {{ $account->color_class }}"></div>

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

                    <a href="{{ route('accounts.edit', $account->id) }}">
                        <x-buttons.action>
                            <x-icon style="font-size: 20px">
                                edit
                            </x-icon>
                            Edit
                        </x-buttons.action>
                    </a>

                    <x-buttons.action class="text-red-600"
                                      x-data=""
                                      x-on:click.prevent="$dispatch('open-modal', 'confirm-account-{{ $account->id }}-deletion')">
                        <x-icon style="font-size: 20px">
                            delete
                        </x-icon>
                        Delete
                    </x-buttons.action>
                </x-dropdown.body>
            </x-dropdown.menu>
        </div>

        <x-cards.title class="mt-4 mb-0">
            {{ Number::currency($account->balance, in: 'BGN', locale: 'bg') }}
        </x-cards.title>

        <x-cards.text class="text-gray-950 text-sm">{{  count($account->transactions) }} transactions</x-cards.text>
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
        <a href="{{ route('accounts.edit', $account->id) }}">

            <x-buttons.action>
                <x-icon style="font-size: 20px">
                    edit
                </x-icon>
                Edit
            </x-buttons.action>
        </a>
        <x-buttons.action class="text-red-600"
                          x-data=""
                          x-on:click.prevent="$dispatch('open-modal', 'confirm-account-{{ $account->id }}-deletion')">
            <x-icon>
                delete
            </x-icon>
            Delete
        </x-buttons.action>
    </div>
</x-panels.panel>

<x-modal name="confirm-account-{{ $account->id }}-deletion">
    <form method="post" action="{{ route('accounts.destroy', $account->id) }}" class="p-6">
        @csrf
        @method('DELETE')

        <x-panels.heading>
            {{ __('Are you sure you want to delete your account?') }}
        </x-panels.heading>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        </p>

        <div class="mt-6 flex flex-col md:flex-row items-center justify-end w-full gap-2">
            <x-buttons.secondary x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-buttons.secondary>

            <x-buttons.danger>
                {{ __('Delete Account') }}
            </x-buttons.danger>
        </div>
    </form>
</x-modal>
