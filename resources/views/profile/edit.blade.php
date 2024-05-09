<x-app-layout>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <x-panel>
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </x-panel>

        <x-panel>
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </x-panel>
    </div>

    <x-panel>
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </x-panel>
</x-app-layout>
