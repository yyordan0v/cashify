<x-app-layout>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <x-panels.panel>
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </x-panels.panel>

        <x-panels.panel>
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </x-panels.panel>
    </div>

    <x-panels.panel :modal="true">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </x-panels.panel>
</x-app-layout>
