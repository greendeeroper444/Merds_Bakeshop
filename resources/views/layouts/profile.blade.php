<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <img onclick="window.location.href='/home';" src="{{ asset('assets/img/logo/logo.png') }}" alt="Bakeshop Logo">
        </div>
        <h1>Your Personal Profile</h1>
    </header>

    <div class="container" id="content-container">
        @yield('content')
    </div>

      <script>

        //To show the image
        function showImagePreview(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.createElement('img');
                    preview.setAttribute('src', e.target.result);
                    preview.setAttribute('class', 'avatar-preview-image');
                    const previewContainer = document.getElementById('avatar-preview');
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(preview);
                };
                reader.readAsDataURL(file);
            }
        }

        //To show the form-container when I click Change Profile
        function toggleFormContainer() {
          const formContainer = document.querySelector('.form-container');
          const changeAvatarBtn = document.getElementById('change-avatar-btn');

          if (formContainer.style.display === 'none') {
            formContainer.style.display = 'block';
            changeAvatarBtn.textContent = 'Close Change';
          } else {
            formContainer.style.display = 'none';
            changeAvatarBtn.textContent = 'Change Profile';
          }
        }
      </script>
</body>
</html>
