<script src="https://cdn.tailwindcss.com"></script>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
</x-slot>
<div class="container">
    <table class="table-fixed w-9/12">
    <tr><td class="font-bold">Nom</td><td class="font-bold">Email</td><td class="font-extrabold">Mot de passe</td></tr>
    @foreach($users as $user)
        <tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->password }}</td></tr>
    @endforeach
    </table>
</div>
    