<x-app-layout>
    <div class="flex flex-col gap-4 mb-4" id="list">
        {{-- Add Account Button --}}
        <a href="{{ route('accounts.create') }}" class="col-span-2">
            <x-buttons.card-button padding="p-4" class="xl:p-8">
                Account
            </x-buttons.card-button>
        </a>

        @foreach($accounts as $account)
            @include('accounts.partials.show', ['account' => $account])
        @endforeach
    </div>
</x-app-layout>

