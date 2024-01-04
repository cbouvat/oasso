<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des membres') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-3xl bg-white p-8 rounded-md shadow-lg w-full">
            <!-- Profile Section -->
            <div class="flex items-center">
                <!-- Profile Image -->
                <div class="flex-shrink-0 mr-2">
                    <!-- Profile image is to be modified to show images in the future -->
                    <img class="h-22 w-22 rounded-full object-cover" src="https://picsum.photos/200" alt="Profile Image">
                </div>

                <!-- Profile Information -->
                <div>
                    <h3 class="text-4xl font-extrabold mb-4">{{ $user->first_name }} {{ $user->last_name}}</h3>
                    <p class="text-gray-600 text-lg mb-2">{{ $user->email}}</p>
                    <p class="text-gray-600 text-lg mb-2">{{ $user->gender }}</p>
                </div>
            </div>

            <!-- Additional Profile Details -->
            <div class="mt-6">
                <h4 class="text-2xl font-semibold mb-2">Additional Information</h4>
                <p class="text-gray-600 text-lg">Location: {{ $user->address }}, {{ $user->city }}</p>
                <p class="text-gray-600 text-lg">Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </div>
</x-app-layout>
