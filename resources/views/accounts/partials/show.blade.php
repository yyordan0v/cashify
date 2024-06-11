@props(['account'])
<div hx-target="this" id="account-{{  $account->id }}">
    <x-panels.panel padding="p-4" class="xl:p-8 flex items-center justify-between">
        <div class="flex items-start flex-col xl:w-auto w-full">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center">
                    <div class="block w-4 h-4 rounded-full mr-4  {{ $account->color_class }}"></div>

                    <x-cards.title class="text-base mt-0 mb-0">{{ $account->name }}</x-cards.title>
                </div>

                <x-dropdown.menu>
                    <x-dropdown.button>
                        more_vert
                    </x-dropdown.button>

                    <x-dropdown.body>
                        <x-buttons.action hx-get="{{ route('accounts.transfer', $account->id) }}"
                                          hx-push-url="true"
                                          hx-swap="outerHTML"
                                          class="w-full">
                            <x-icon style="font-size: 20px">
                                compare_arrows
                            </x-icon>
                            Transfer Balance
                        </x-buttons.action>

                        <x-buttons.action hx-get="{{ route('accounts.edit', $account->id) }}"
                                          hx-push-url="true"
                                          hx-swap="outerHTML"
                                          class="w-full">
                            <x-icon style="font-size: 20px">
                                edit
                            </x-icon>
                            Edit
                        </x-buttons.action>

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

        <div
            class="hidden xl:flex self-start justify-end gap-2 text-gray-600 dark:text-gray-400 text-sm">

            <x-buttons.action hx-get="{{ route('accounts.transfer', $account->id) }}"
                              hx-push-url="true"
                              hx-target="#account-{{$account->id}}"
                              hx-swap="outerHTML">
                <x-icon>
                    compare_arrows
                </x-icon>
                Transfer Balance
            </x-buttons.action>

            <x-buttons.action hx-get="{{ route('accounts.edit', $account->id) }}"
                              hx-push-url="true"
                              hx-swap="outerHTML">
                <x-icon style="font-size: 20px">
                    edit
                </x-icon>
                Edit
            </x-buttons.action>

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
        <form hx-delete="{{ route('accounts.destroy', $account->id) }}" hx-swap="outerHTML"
              hx-push-url="{{ route('accounts.index') }}"
              class="p-6">
            @csrf

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
</div>
