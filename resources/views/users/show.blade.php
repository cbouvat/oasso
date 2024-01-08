<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Member') }} {{ $user->id }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center bg-gray-100 py-12">
        <div class="w-full max-w-3xl rounded-md bg-white p-8 shadow-lg">
            <!-- Profile Section -->
            <div class="flex items-center">
                <!-- Profile Image -->
                <div class="mr-2 flex-shrink-0">
                    <!-- Profile image is to be modified to show images in the future -->
                    <img alt="Profile Image" class="h-22 w-22 rounded-full object-cover" src="https://picsum.photos/200">
                </div>

                <!-- Profile Information -->
                <div>
                    <h3 class="mb-4 text-4xl font-extrabold">{{ $user->first_name }} {{ $user->last_name }}</h3>
                    <p class="mb-2 text-lg text-gray-600">{{ $user->email }}</p>
                    <p class="mb-2 text-lg text-gray-600">{{ $user->gender }}</p>
                </div>
            </div>

            <!-- Additional Profile Details -->
            <div class="mt-6">
                <h4 class="mb-2 text-2xl font-semibold">{{ __('Additional Information') }}</h4>
                <p class="text-lg text-gray-600">{{ __('Location') }}: {{ $user->address }}, {{ $user->city }},
                    {{ $user->postal_code }}</p>
                <p class="text-lg text-gray-600">{{ __('Phone Number') }}: {{ $user->phone }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
