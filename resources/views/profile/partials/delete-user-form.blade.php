<section class="space-y-6">
    <header>
      <p class="section-description">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
    </header>

    <button class="delete-button" onclick="openModal('confirm-user-deletion-modal')">Delete Account</button>

    <div id="confirm-user-deletion-modal" class="modal-container">
      <div class="modal-content">
        <h2 class="modal-header">Are you sure you want to delete your account?</h2>
        <p class="modal-description">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>

        <form method="post" action="{{ route('profile.destroy') }}">
          @csrf
          @method('delete')

          <div>
            <label class="modal-input-label" for="password">Password</label>
            <input id="password" name="password" type="password" class="modal-input-field" placeholder="Password">
            <div class="modal-input-error">{{ $errors->userDeletion->first('password') }}</div>
          </div>

          <div class="modal-buttons">
            <button type="button" class="cancel-button" onclick="closeModal('confirm-user-deletion-modal')">Cancel</button>
            <button type="submit" class="delete-button">Delete Account</button>
          </div>
        </form>

        @if (session('status') === 'account-deleted')
          <p class="modal-status-message modal-status-message-success">Your account has been deleted.</p>
        @endif
      </div>
    </div>

    <script>
      function openModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.style.display = 'block';
      }

      function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.style.display = 'none';
      }
    </script>
  </section>
