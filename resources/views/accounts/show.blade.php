<x-app-layout>
    @fragment('panel')
        @include('accounts.partials.show', ['account' => $account])
    @endfragment
</x-app-layout>
