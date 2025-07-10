<!-- header.blade.php -->

<!-- ✅ Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 shadow-sm mb-0">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="#">Pet Care</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item px-2"><a class="nav-link active fw-semibold" href="/">Home</a></li>
                <li class="nav-item px-2"><a class="nav-link fw-semibold" href="/#about">About Us</a></li>
                <li class="nav-item px-2"><a class="nav-link fw-semibold" href="/#whatwedo">Services</a></li>
                <li class="nav-item px-2"><a class="nav-link fw-semibold" href="/shop">Shop</a></li>
                <li class="nav-item px-2"><a class="nav-link fw-semibold" href="https://www.zoetispetcare.com/blog">Blog</a></li>
                <li class="nav-item px-2"><a class="nav-link fw-semibold" href="/#contact">Contact</a></li>
            </ul>
            <a href="#appointment" class="btn btn-light ms-3 fw-semibold px-3 py-2">Get An Appointment</a>
        </div>
    </div>
</nav>

<!-- ✅ Bootstrap Carousel Slider with auto-slide every 1.2 sec, slide animation, no manual arrows -->
<div id="petCarousel" class="carousel slide mt-0" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="/images/slide1.jpg" class="d-block w-100 object-fit-cover" alt="Slide 1" style="height: 500px;">
            <div class="carousel-caption d-none d-md-block text-start">
                <h5 class="fw-bold">Healthy Pets</h5>
                <p>We take care of your lovely pets.</p>
                <a href="#" class="btn btn-primary fw-semibold">Learn More</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="/images/slide2.jpg" class="d-block w-100 object-fit-cover" alt="Slide 2" style="height: 500px;">
            <div class="carousel-caption d-none d-md-block text-center">
                <h5 class="fw-bold">Pet Grooming</h5>
                <p>Professional grooming services for cats and dogs.</p>
                <a href="#" class="btn btn-light text-primary fw-semibold">Book Grooming</a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="/images/slide3.jpg" class="d-block w-100 object-fit-cover" alt="Slide 3" style="height: 500px;">
            <div class="carousel-caption d-none d-md-block text-end">
                <h5 class="fw-bold">Pet Supplies</h5>
                <p>High-quality products for your pets.</p>
                <a href="#" class="btn btn-success fw-semibold">Shop Now</a>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item">
            <img src="/images/slide4.jpg" class="d-block w-100 object-fit-cover" alt="Slide 4" style="height: 500px;">
            <div class="carousel-caption d-none d-md-block text-center">
                <h5 class="fw-bold">Emergency Care</h5>
                <p>24/7 emergency services for your pets.</p>
                <a href="#" class="btn btn-danger fw-semibold">Contact Emergency</a>
            </div>
        </div>
    </div>

    <!-- Indicators only -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="3"></button>
    </div>
</div>
