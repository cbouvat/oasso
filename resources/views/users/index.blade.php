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
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-3xl font-extrabold">Liste des membres</h3>
                    <a href="add" class="bg-slate-500 text-white px-4 py-2 rounded-md hover:bg-slate-600 focus:outline-none focus:ring focus:border-blue-300">
                        Ajouter un utilisateur
                    </a>
                </div>

                <ul>
                    @foreach ($users as $user)
                        <li class="mb-4">
                            <a href="{{ route('users.show', ['user' => $user]) }}" class="text-decoration-none">
                                <div class="bg-gray-100 p-4 rounded-md shadow-md hover:bg-gray-200">
                                    <h4 class="text-lg font-semibold mb-2">{{ $user->first_name }} {{ $user->last_name }}</h4>
                                    <p class="text-gray-600">{{ $user->email }}</p>
                                </div>
                            </a>    
                        </li>
                    @endforeach
                </ul>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

