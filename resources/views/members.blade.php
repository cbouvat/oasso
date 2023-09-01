
<x-app-layout>
    <x-slot name="header">
        <div class="container w-full">
            <form class="w-60 flex flex-row" method="GET" action="{{ route('search') }}">
                <input type="search" name="namesearch" id="default-search" class="block w-48 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Type any name..." required>
                <x-secondary-button class="mx-2" type="submit">rechercher</x-secondary-button>
            </form>
        </div>
        
    </x-slot>



<div class="container">
    <table class="table-fixed w-9/12 text-slate-200">
        <tr><td class="font-bold">Nom</td><td class="font-bold">Email</td><td class="font-extrabold">Mot de passe</td></tr>
        @foreach($users as $user)
            <tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->password }}</td></tr>
        @endforeach
    </table>
</div>
    
</x-app-layout>

<