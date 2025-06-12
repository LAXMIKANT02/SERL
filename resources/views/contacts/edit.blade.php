
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('contacts.update', $contact) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $contact->name) }}" class="mt-1 block w-full px-3 py-2 border text-gray-900 border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $contact->email) }}" class="mt-1 block w-full px-3 py-2 border text-gray-900 border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <button type="submit" class="mt-6 bg-blue-600 text-white px-4 py-2 rounded">Save Changes</button>
                                <a href="{{ route('contacts.index') }}" class="mt-6 ml-4 text-blue-600 hover:text-blue-800">Back to Contacts</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
