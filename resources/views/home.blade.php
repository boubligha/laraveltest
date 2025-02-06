<x-master title="Home">
        <h1>Welcome to your home</h1>
        {{-- Passing data using slot --}}

        <x-alert type="warning">
            <strong>Salam</strong>
        </x-alert>
        <x-alert type="danger">
            <strong>hi</strong>
        </x-alert>
        {{-- Passing data to a component using props --}}
        <x-users-table :users="$users"/>
</x-master>