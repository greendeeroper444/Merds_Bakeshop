<section>
    <header>
        <p class="form-description">Update your account's profile information and email address.</p>
  </header>

  <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
  </form>

  <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div class="form-section">
        <label class="form-input-label" for="avatar">Avatar</label>
        <input id="avatar" name="avatar" type="file" accept="image/*" class="form-input-field" onchange="showImagePreview(event)">
        <div id="avatar-preview"></div>
        @if ($errors->has('avatar'))
        <div class="form-input-error">{{ $errors->first('avatar') }}</div>
        @endif
    </div>

    <div class="form-section">
      <label class="form-input-label" for="name">Name</label>
      <input id="name" name="name" type="text" class="form-input-field" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
      @if ($errors->has('name'))
        <div class="form-input-error">{{ $errors->first('name') }}</div>
      @endif
    </div>

    <div class="form-section">
      <label class="form-input-label" for="email">Email</label>
      <input id="email" name="email" type="email" class="form-input-field" value="{{ old('email', $user->email) }}" required autocomplete="username">
      @if ($errors->has('email'))
        <div class="form-input-error">{{ $errors->first('email') }}</div>
      @endif

      @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div>
          <p class="form-status-message">Your email address is unverified.</p>
          <button form="send-verification" class="form-button">Click here to re-send the verification email.</button>
        </div>
        @if (session('status') === 'verification-link-sent')
          <p class="form-status-message form-status-message-success">A new verification link has been sent to your email address.</p>
        @endif
      @endif
    </div>

    <div class="form-section">
        <label class="form-input-label" for="phone_number">Phone Number</label>
        <input id="phone_number" name="phone_number" type="text" class="form-input-field" value="{{ old('phone_number', $user->phone_number) }}" autocomplete="tel">
        @if ($errors->has('phone_number'))
            <div class="form-input-error">{{ $errors->first('phone_number') }}</div>
        @endif
    </div>

    <div class="form-section">
        <label class="form-input-label" for="address">Address</label>
        <textarea id="address" name="address" class="form-input-field">{{ old('address', $user->address) }}</textarea>
        @if ($errors->has('address'))
            <div class="form-input-error">{{ $errors->first('address') }}</div>
        @endif
    </div>

    <div class="form-section">
      <div class="flex items-center gap-4">
        <button type="submit" class="form-button">Save</button>
        @if (session('status') === 'profile-updated')
          <p
              x-data="{ show: true }"
              x-show="show"
              x-transition
              x-init="setTimeout(() => show = false, 2000)"
              class="form-status-message form-status-message-success"
          >Your profile information has been changed.</p>
        @endif
      </div>
    </div>
  </form>
</section>
