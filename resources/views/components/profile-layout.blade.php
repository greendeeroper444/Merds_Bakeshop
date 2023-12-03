<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <img onclick="window.location.href='/home';" src="{{ asset('assets/img/logo/logo.png') }}" alt="Bakeshop Logo">
            <h1>Your Profile</h1>
        </div>
    </header>

      <section id="profile">
        <h2>User Profile</h2>
        <div class="profile-details">
          <img src="profile-picture.jpg" alt="User Profile Picture">
          <div class="user-info">
            <h3>John Doe</h3>
            <p><strong>Email:</strong> johndoe@example.com</p>
            <p><strong>Phone:</strong> 123-456-7890</p>
            <p><strong>Address:</strong> 123 Bakery Street, City, Country</p>
            <button id="change-avatar-btn">Change Avatar</button>
          </div>
        </div>
        <div class="bio-section">
          <h4>Bio</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce non tortor auctor, iaculis tortor ut, consectetur urna. Vestibulum et ante metus. Nulla facilisi. Phasellus id risus et neque ultrices fringilla eu vel nunc.</p>
        </div>
      </section>

      {{ $slot }}

      <footer>
        <p>&copy; 2023 - Merds Bakeshop</p>
      </footer>

      <script>
        // JavaScript code for avatar change functionality
        const changeAvatarBtn = document.getElementById('change-avatar-btn');
        changeAvatarBtn.addEventListener('click', () => {
          // Logic for changing the avatar
          console.log('Change Avatar button clicked');
        });
      </script>
</body>
</html>
