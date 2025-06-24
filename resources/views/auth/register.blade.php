<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="bg-glass shadow-lg p-8 rounded-xl max-w-md w-full mx-auto">
        @csrf

        <h2 class="text-2xl font-semibold text-center text-white mb-6">📝 Create Your Account</h2>

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <div class="relative">
                
                <x-text-input id="name" class="block mt-1 w-full pl-10" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <div class="relative">
               
                <x-text-input id="email" class="block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                
                <x-text-input id="password" class="block mt-1 w-full pl-10" type="password" name="password" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="relative">
               
                <x-text-input id="password_confirmation" class="block mt-1 w-full pl-10" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-between items-center mb-4">
            <a class="text-sm text-indigo-300 hover:text-indigo-500 underline" href="{{ route('login') }}">
                Already registered?
            </a>
            <x-primary-button class="btn-glow">
                Register
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
