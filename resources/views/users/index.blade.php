<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Liste des membres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white p-6 shadow-xl sm:rounded-lg">

                <!-- Display the list of users -->
                <div class="mb-6 flex">
                    <a class="rounded-md bg-slate-500 px-4 py-2 text-white hover:bg-slate-600 focus:border-blue-300 focus:outline-none focus:ring"
                        href="{{ route('users.create') }}">
                        Ajouter un utilisateur
                    </a>
                </div>

                <ul>
                    @foreach ($users as $user)
                        <li class="mb-4">
                            <a class="text-decoration-none" href="{{ route('users.show', ['user' => $user]) }}">
                                <div class="rounded-md bg-gray-100 p-4 shadow-md hover:bg-gray-200">
                                    <h4 class="mb-2 text-lg font-semibold">{{ $user->first_name }}
                                        {{ $user->last_name }}</h4>
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
