{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@section('title', 'Sign In')
<x-guest-layout>
    <div class="login-form-container">

        <div id="close-login-btn" class="fas fa-times"></div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h3>SIGN IN</h3>
            <div class="input-group">
                <span>Email address:</span>
                <input type="email" name="email" class="box" placeholder="enter your email address" id="email" :value="old('email')" required autofocus autocomplete="username">
                @error('email') <span class="mt-2">{{ $message }}</span> @enderror
            </div>

            <div class="input-group">
                <span>Password:</span>
                <input type="password" name="password" class="box" placeholder="enter your password" id="password" required autocomplete="current-password">
                @error('password') <span class="mt-2">{{ $message }}</span> @enderror
            </div>

            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="remmember-me">
                <label for="remmember-me">Remember me</label>
            </div>

            <input type="submit" value="Sign in" class="btn">
            @if (Route::has('password.request'))
                <p>Forget password? <a href="{{ route('password.request') }}">Click here</a></p>
            @endif
                <p>Don't have an account? <a href="{{ route('register') }}">Create an account</a></p>
        </form>

    </div>
</x-guest-layout>
