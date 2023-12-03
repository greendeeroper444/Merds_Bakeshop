<section>
    <header>
        <p class="section-description">Ensure your account is using a long, random password to stay secure.</p>
  </header>

  <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('put')

    <div class="form-section">
      <label class="form-input-label" for="current_password">Current Password</label>
      <input id="current_password" name="current_password" type="password" class="form-input-field" autocomplete="current-password">
      <div class="form-input-error">{{ $errors->updatePassword->first('current_password') }}</div>
    </div>

    <div class="form-section">
      <label class="form-input-label" for="password">New Password</label>
      <input id="password" name="password" type="password" class="form-input-field" autocomplete="new-password">
      <div class="form-input-error">{{ $errors->updatePassword->first('password') }}</div>
    </div>

    <div class="form-section">
      <label class="form-input-label" for="password_confirmation">Confirm Password</label>
      <input id="password_confirmation" name="password_confirmation" type="password" class="form-input-field" autocomplete="new-password">
      <div class="form-input-error">{{ $errors->updatePassword->first('password_confirmation') }}</div>
    </div>

    <div class="form-section">
      <button type="submit" class="form-button">Save</button>
      @if (session('status') === 'password-updated')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="form-status-message form-status-message-success"
        >Saved.</p>
      @endif
    </div>
  </form>
</section>
