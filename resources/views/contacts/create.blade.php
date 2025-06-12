
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-1 gap-6">
       
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 text-gray-900 block w-full" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 text-gray-900 block w-full" required>
        </div>
        <div>
            <button type="submit" class="mt-6 bg-blue-600 text-white px-4 py-2 rounded">Save Contact</button>
            <a href="{{ route('contacts.index') }}" class="ml-4 text-blue-600 hover:text-blue-800">Back</a>
        </div>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
