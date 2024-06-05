<x-app-layout>
    <div class="grid xl:grid-cols-2 gap-4 mb-4" id="list">

        @foreach($accounts as $account)
            @include('accounts.partials.show', ['account' => $account])
        @endforeach

        {{-- Add Account Button --}}
        <a href="{{ route('accounts.create') }}" class="col-span-2">
            <x-buttons.card-button padding="p-8">
                Account
            </x-buttons.card-button>
        </a>
    </div>
</x-app-layout>

