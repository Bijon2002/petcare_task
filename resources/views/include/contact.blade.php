<section class="py-5" style="
  background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
              url('/images/contact-us.jpeg') no-repeat center center/cover;
  color: white;
" id="contact">
  <div class="container" style="max-width: 700px;">
    <h2 class="text-center mb-4">Contact Us</h2>

    <form action="" method="POST">
      @csrf
      <div class="row g-3">
        <div class="col-md-6">
          <label for="name" class="form-label">Your Name</label>
          <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Your Email</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
      </div>

      <div class="mt-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" id="subject" name="subject" class="form-control" required>
      </div>

      <div class="mt-3">
        <label for="message" class="form-label">Message</label>
        <textarea id="message" name="message" rows="4" class="form-control" required></textarea>
      </div>

      <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary px-5">Send Message</button>
      </div>
    </form>
  </div>
</section>
