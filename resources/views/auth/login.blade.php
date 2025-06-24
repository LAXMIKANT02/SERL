<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-glass shadow-lg p-8 rounded-xl max-w-md w-full mx-auto">
        @csrf

        <h2 class="text-2xl font-semibold text-center text-white mb-6">🔐 Login to Your Account</h2>

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <div class="relative">
                
                <x-text-input id="email" class="block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                
                <x-text-input id="password" class="block mt-1 w-full pl-10" type="password" name="password" required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember & Forgot -->
        <div class="flex justify-between items-center mb-4 text-sm">
            <label for="remember_me" class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="rounded text-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 border-gray-300 dark:border-gray-700 shadow-sm">
                <span class="ml-2 text-gray-300">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-indigo-400 hover:underline">Forgot password?</a>
            @endif
        </div>

        <!-- Submit -->
        <div>
            <x-primary-button class="w-full justify-center py-2 text-lg btn-glow">
                Log in
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
