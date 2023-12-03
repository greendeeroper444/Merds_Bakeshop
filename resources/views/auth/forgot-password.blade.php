<x-guest-layout>
    <div class="forgot-container">
        <h2>Forgot Password</h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" :value="old('email')" required autofocus />
            <input type="submit" class="btn" value="Email Password Reset Link">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </form>
    </div>
</x-guest-layout>
