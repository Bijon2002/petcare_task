<div>
    <!-- Carousel Display -->
    <div id="petCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">
            @forelse ($sliders as $index => $slider)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $slider->image_path) }}" class="d-block w-100"
                        style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block text-center">
                        <h5 class="fw-bold">{{ $slider->title }}</h5>
                        <p>{{ $slider->subtitle }}</p>
                        @if ($slider->button_text && $slider->button_link)
                            <a href="{{ $slider->button_link }}" class="btn btn-primary btn-sm fw-semibold">
                                {{ $slider->button_text }}
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center p-4">No slides available.</div>
            @endforelse
        </div>

        <div class="carousel-indicators">
            @foreach ($sliders as $index => $slider)
                <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>
    </div>

    <!-- Toggle Edit Table -->
    <center>
        <button wire:click="toggleEditTable" class="btn btn-warning fw-semibold mt-3">
            ✏️ Edit Slides
        </button>
    </center>

    <div class="d-flex justify-content-center">
        <div class="mt-4 transition-all ease-in-out"
            style="{{ $showEditTable ? 'max-height: 5000px; opacity: 1;' : 'max-height: 0; opacity: 0; overflow: hidden;' }}">
            <div class="card p-3 shadow" style="max-width: 900px; margin: auto;">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>
                                <input type="checkbox" wire:click="toggleSelectAll">
                            </th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Button Text</th>
                            <th>Button Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($editSlides as $i => $slide)
                            <tr>
                                <td>
                                    <input type="checkbox" wire:model="selected" value="{{ $slide['id'] }}">
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . ($sliders->find($slide['id'])->image_path ?? '')) }}"
                                        style="max-height: 100px; object-fit: contain;">
                                </td>
                                <td>
                                    <input type="text" wire:model.defer="editSlides.{{ $i }}.title" class="form-control">
                                </td>
                                <td>
                                    <input type="text" wire:model.defer="editSlides.{{ $i }}.subtitle" class="form-control">
                                </td>
                                <td>
                                    <input type="text" wire:model.defer="editSlides.{{ $i }}.button_text" class="form-control">
                                </td>
                                <td>
                                    <input type="text" wire:model.defer="editSlides.{{ $i }}.button_link" class="form-control">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex gap-2 justify-content-center mb-3">
                    <button wire:click="bulkUpdate" class="btn btn-success">✅ Update Slides</button>
                    <button wire:click="confirmDeleteSelected" class="btn btn-danger">🗑️ Delete Selected</button>
                </div>

                <hr>

                <!-- Add New Slide -->
                <h6 class="text-center">Add New Slide</h6>
                <form wire:submit.prevent="addSlide" class="p-2">
                    <div class="mb-2">
                        <input type="file" wire:model="newImage" class="form-control">
                        @error('newImage') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <input type="text" wire:model="newTitle" class="form-control" placeholder="Title">
                    </div>
                    <div class="mb-2">
                        <input type="text" wire:model="newSubtitle" class="form-control" placeholder="Subtitle">
                    </div>
                    <div class="mb-2">
                        <input type="text" wire:model="newButtonText" class="form-control" placeholder="Button Text">
                    </div>
                    <div class="mb-2">
                        <input type="text" wire:model="newButtonLink" class="form-control" placeholder="Button Link">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">➕ Add Slide</button>
                </form>
            </div>
        </div>
    </div>
<!-- Make sure Bootstrap 5 CSS is loaded in your <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Your Livewire scripts come here -->

<!-- Bootstrap 5 JS bundle (includes Popper) - load after Livewire scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert & Carousel Fix -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:navigated', () => {
            // SweetAlert confirm delete
            window.addEventListener('confirmDelete', () => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to undo this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete!',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteConfirmed');
                    }
                });
            });

            // Success toast with fallback message
            window.addEventListener('showSuccess', event => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: event.detail?.message ?? 'Operation completed successfully!',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });
            });

            // 🛠 Re-initialize carousel after Livewire updates
            const myCarouselElement = document.querySelector('#petCarousel');
            if (myCarouselElement) {
                const carousel = bootstrap.Carousel.getOrCreateInstance(myCarouselElement);
                carousel.cycle();
            }
        });
    </script>
</div>
