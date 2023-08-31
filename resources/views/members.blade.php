
<x-app-layout>
    <x-slot name="header">

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