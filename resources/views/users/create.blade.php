<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add member') }}
        </h2>
    </x-slot>
    <div class="flex items-center justify-center py-12">
        <div class="flex w-2/4 flex-col items-center rounded-md bg-slate-50 p-8 shadow-md">
            <form action="{{ route('users.store') }}" class="w-3/4" method="POST">
                @csrf
                <x-validation-errors class="mb-4" />

                <div class="mt-4">
                    <x-label for="gender" value="{{ __('Sexe') }}" />
                    <x-select class="mt-1 block w-full" id="gender" name="gender">
                        <option value="male">{{ __('Male') }}</option>
                        <option value="female">{{ __('Female') }}</option>
                        <option value="other">{{ __('Other') }}</option>
                    </x-select>
                </div>

                <div class="mt-4">
                    <x-label for="last_name" value="{{ __('Nom') }}" />
                    <x-input :value="old('last_name')" autocomplete="family-name" class="mt-1 block w-full" id="last_name"
                        name="last_name" required type="text" />
                </div>

                <div class="mt-4">
                    <x-label for="first_name" value="{{ __('Prénom') }}" />
                    <x-input :value="old('first_name')" autocomplete="given-name" autofocus class="mt-1 block w-full"
                        id="first_name" name="first_name" required type="text" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input :value="old('email')" autocomplete="username" class="mt-1 block w-full" id="email"
                        name="email" required type="email" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input autocomplete="new-password" class="mt-1 block w-full" id="password" name="password"
                        required type="password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input autocomplete="new-password" class="mt-1 block w-full" id="password_confirmation"
                        name="password_confirmation" required type="password" />
                </div>

                <div class="mt-4 flex items-center justify-end space-x-8">
                    <a class = 'inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-red-700 focus:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-red-800'
                        href="{{ route('users.index') }}">
                        {{ __('Cancel') }}
                    </a>
                    <x-button>
                        {{ __('Add') }}
                    </x-button>
                </div>
            </form>
        </div>
</x-app-layout>
