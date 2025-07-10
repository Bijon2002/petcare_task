<section class="appointment-form d-flex align-items-center py-5" id="appointment" style="
  background:
    linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
    url('/images/background.jpg') no-repeat center center/cover;
  color: white;
  margin-bottom: 0;
  padding-bottom: 2rem;
  min-height: 100vh;
">
  <div class="container-fluid px-4" style="max-width: 1200px;">
    <h2 class="text-center mb-4">Get An Appointment</h2>

    <form action="" method="POST">
      @csrf

      <div class="row g-3">
        <div class="col-12 col-md-3">
          <label for="first_name" class="form-label">First Name</label>
          <input type="text" id="first_name" name="first_name" class="form-control" required>
        </div>

        <div class="col-12 col-md-3">
          <label for="last_name" class="form-label">Last Name</label>
          <input type="text" id="last_name" name="last_name" class="form-control" required>
        </div>

        <div class="col-12 col-md-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="col-12 col-md-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" id="phone" name="phone" class="form-control" required>
        </div>
      </div>

      <div class="row g-3 mt-3">
        <div class="col-12 col-md-3">
          <label for="pet_category" class="form-label">Pet Category</label>
          <select id="pet_category" name="pet_category" class="form-select" required>
            <option value="" disabled selected>Select category</option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="bird">Bird</option>
            <option value="other">Other</option>
          </select>
        </div>

        <div class="col-12 col-md-3">
          <label for="service_type" class="form-label">Service Type</label>
          <select id="service_type" name="service_type" class="form-select" required>
            <option value="" disabled selected>Select service</option>
            <option value="checkup">Check-up</option>
            <option value="vaccination">Vaccination</option>
            <option value="grooming">Grooming</option>
            <option value="other">Other</option>
          </select>
        </div>

        <div class="col-12 col-md-6">
          <label for="notes" class="form-label">Anything we should know about your pet?</label>
          <textarea id="notes" name="notes" rows="1" class="form-control"></textarea>
        </div>
      </div>
<br><br><br>
      <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary px-5 w-20">Submit</button>
      </div>
    </form>
  </div>
</section>
