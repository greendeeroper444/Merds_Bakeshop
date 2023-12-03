{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@section('title', 'Sign Up')
<x-guest-layout>
    <div class="register-form-container">

        <div id="close-register-btn" class="fas fa-times"></div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h3>SIGN UP</h3>
            <div class="form-group">
                <div class="input-group">
                    <span>Username:</span>
                    <input type="name" name="name" class="box" placeholder="enter your username" id="name" :value="old('name')" required autofocus autocomplete="name">
                    @error('name') <span class="mt-2">{{ $message }}</span> @enderror
                </div>
                <div class="input-group">
                    <span>Email address:</span>
                    <input type="email" name="email" class="box" placeholder="enter your email address" id="email" :value="old('email')" required autofocus autocomplete="username">
                    @error('email') <span class="mt-2">{{ $message }}</span> @enderror
                </div>

                <div class="input-group">
                    <span>Password:</span>
                    <input type="password" name="password" class="box" placeholder="enter your password" id="password" required autocomplete="current-password">
                    <span class="toggle-password" onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye-slash"></i>
                    </span>
                    @error('password') <span class="mt-2">{{ $message }}</span> @enderror
                </div>

                <div class="input-group">
                    <span>Confirm Password:</span>
                    <input type="password" name="password_confirmation" class="box" placeholder="confirm password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" >
                    @error('password_confirmation') <span class="mt-2">{{ $message }}</span> @enderror
                </div>
                <div class="input-group">
                    <span>Phone Number:</span>
                    <input type="number" name="phone_number" class="box" placeholder="enter your phone number" id="phone_number" :value="old('phone_number')" required autocomplete="tel">
                </div>

                <div class="input-group">
                    <span>Address:</span>
                    <textarea name="address" class="box" placeholder="enter your address" id="address" required autocomplete="street-address"></textarea>
                </div>
            </div>

            <div class="btn-container">
                <input type="submit" value="Sign up" class="btn" name="register">
                <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </div>
        </form>

    </div>
</x-guest-layout>
