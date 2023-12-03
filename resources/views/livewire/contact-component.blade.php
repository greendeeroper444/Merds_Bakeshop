@section('title', 'Contact us')

<main class="main-container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/home" title="Home">Home</a></li>
            <span class="slash">/</span>
            <li class="item-link"><span>Contact us</span></li>
        </ul>
    </div>
    <section class="contact-section">
      <h1>Contact Us</h1>
      <p>Get in touch with us for any inquiries or feedback.</p>
      <form class="contact-form" action="/submit_contact_form" method="POST">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit">Submit</button>
      </form>
    </section>
  </main>
