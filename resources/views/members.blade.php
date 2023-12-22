<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des membres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Display the list of users -->
                <h3 class="text-3xl font-extrabold mb-6">List of Users</h3>
                <ul>
                    @foreach ($users as $user)
                        <li class="mb-4">
                            <div class="bg-gray-100 p-4 rounded-md shadow-md">
                                <h4 class="text-lg font-semibold mb-2">{{ $user->first_name }} {{ $user->last_name }}</h4>
                                <p class="text-gray-600">{{ $user->email }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
