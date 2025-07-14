<!-- whatwedo.blade.php -->

<section class="py-5" id="whatwedo">
    <div class="container text-center">
       <h2 class="fw-bold mb-4 text-primary">What We Do</h2>

        <p class="text-muted mb-5">We provide the best services to keep your pets happy and healthy.</p>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="service-card position-relative overflow-hidden rounded shadow" style="height: 300px;">
                    <!-- Front -->
                    <div class="card-front d-flex flex-column justify-content-center align-items-center h-100 p-3 bg-primary text-white">
                        <i class="bi bi-heart fs-1 mb-2"></i>
                        <h5 class="fw-bold">Pet Wellness</h5>
                        <p>We Take Care Of Your Pet</p>
                        <small>Deluxe care for your furry friend.</small>
                        <a href="#" class="btn btn-light btn-sm mt-2">Read More</a>
                    </div>
                    <!-- Overlay -->
                    <div class="card-overlay position-absolute top-0 start-0 w-100 h-100 p-0 m-0">
                        <img src="/images/services1.jpg" class="img-cover" alt="Pet Wellness">
                        <div class="label-overlay d-flex flex-column justify-content-center align-items-center text-center">
                            <p class="mb-2 px-3">In-depth care and checkups for your pet's health and happiness, ensuring a long and joyful life.</p>
                            <a href="#" class="btn btn-dark btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="service-card position-relative overflow-hidden rounded shadow" style="height: 300px;">
                    <!-- Front -->
                    <div class="card-front d-flex flex-column justify-content-center align-items-center h-100 p-3 bg-success text-white">
                        <i class="bi bi-scissors fs-1 mb-2"></i>
                        <h5 class="fw-bold">Grooming</h5>
                        <p>We Groom With Care</p>
                        <small>Expert grooming services with love.</small>
                        <a href="#" class="btn btn-light btn-sm mt-2">Read More</a>
                    </div>
                    <!-- Overlay -->
                    <div class="card-overlay position-absolute top-0 start-0 w-100 h-100 p-0 m-0">
                        <img src="/images/service2.webp" class="img-cover" alt="Grooming">
                        <div class="label-overlay d-flex flex-column justify-content-center align-items-center text-center">
                            <p class="mb-2 px-3">From haircuts to baths, we keep your pets clean, stylish, and comfortable.</p>
                            <a href="#" class="btn btn-dark btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="service-card position-relative overflow-hidden rounded shadow" style="height: 300px;">
                    <!-- Front -->
                    <div class="card-front d-flex flex-column justify-content-center align-items-center h-100 p-3 bg-warning text-dark">
                        <i class="bi bi-bag-heart fs-1 mb-2"></i>
                        <h5 class="fw-bold">Pet Supplies</h5>
                        <p>Quality Products</p>
                        <small>All essentials your pets need.</small>
                        <a href="#" class="btn btn-dark btn-sm mt-2">Read More</a>
                    </div>
                    <!-- Overlay -->
                    <div class="card-overlay position-absolute top-0 start-0 w-100 h-100 p-0 m-0">
                        <img src="/images/service3.jpg" class="img-cover" alt="Pet Supplies">
                        <div class="label-overlay d-flex flex-column justify-content-center align-items-center text-center">
                            <p class="mb-2 px-3">Find toys, treats, and health products to keep your pets happy and active.</p>
                            <a href="#" class="btn btn-dark btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Inline CSS for hover and label styling -->
<style>
    .service-card {
        cursor: pointer;
        position: relative;
    }
    .card-overlay {
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
        position: absolute;
    }
    .service-card:hover .card-overlay {
        opacity: 1;
    }
    .service-card .card-front {
        transition: opacity 0.4s ease-in-out;
    }
    .service-card:hover .card-front {
        opacity: 0;
    }
    .img-cover {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
    }
    .label-overlay {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(255, 255, 255, 0.9);
        color: #000;
        padding: 10px 15px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        z-index: 2;
        width: 100%;
    }
</style>
