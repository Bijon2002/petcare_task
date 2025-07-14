<!-- resources/views/include/slider.blade.php -->

<div id="petCarousel" class="carousel slide mt-0" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        @forelse($sliders as $index => $slider)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $slider->image_path) }}" 
                     class="d-block w-100" 
                     alt="Slide {{ $index + 1 }}" 
                     style="height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block text-center">
                    <h5 class="fw-bold">{{ $slider->title ?? '' }}</h5>
                    <p>{{ $slider->subtitle ?? '' }}</p>
                    @if($slider->button_text && $slider->button_link)
                        <a href="{{ $slider->button_link }}" class="btn btn-primary btn-sm fw-semibold">
                            {{ $slider->button_text }}
                        </a>
                    @endif
                </div>
            </div>
        @empty
        @endforelse
    </div>

    <div class="carousel-indicators">
        @foreach($sliders as $index => $slider)
            <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="{{ $index }}" 
                    class="{{ $index == 0 ? 'active' : '' }}" 
                    aria-current="{{ $index == 0 ? 'true' : 'false' }}" 
                    aria-label="Slide {{ $index + 1 }}">
            </button>
        @endforeach
    </div>
</div>

<center>
    <button class="btn btn-warning fw-semibold mt-3" data-bs-toggle="modal" data-bs-target="#editSlidesModal">
        ✏️ Edit Slides
    </button>
</center>

<!-- Edit Slides Modal -->
<div class="modal fade" id="editSlidesModal" tabindex="-1" aria-labelledby="editSlidesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSlidesLabel">Edit Slides</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="slidesForm">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>Image</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Button Text</th>
                <th>Button Link</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sliders as $slider)
              <tr data-id="{{ $slider->id }}">
                <td><input type="checkbox" class="select-slide"></td>
               <td>
<img src="{{ asset('storage/' . $slider->image_path) }}" alt="slide"
     style="max-height: 500px; width: 100%; object-fit: contain;">

              </td>

                <td><input type="text" class="form-control title" value="{{ $slider->title }}"></td>
                <td><input type="text" class="form-control subtitle" value="{{ $slider->subtitle }}"></td>
                <td><input type="text" class="form-control button_text" value="{{ $slider->button_text }}"></td>
                <td><input type="text" class="form-control button_link" value="{{ $slider->button_link }}"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="mb-3 d-flex gap-2">
            <button type="button" id="updateSlidesBtn" class="btn btn-success">Update Slides</button>
            <button type="button" id="deleteSlidesBtn" class="btn btn-danger">Delete Selected</button>
          </div>
        </form>

        <hr>

        <h6>Add New Slide</h6>
        <form id="addSlideForm" enctype="multipart/form-data">
          @csrf
          <div class="mb-2">
            <input type="file" name="image" required>
          </div>
          <div class="mb-2">
            <input type="text" name="title" class="form-control" placeholder="Title">
          </div>
          <div class="mb-2">
            <input type="text" name="subtitle" class="form-control" placeholder="Subtitle">
          </div>
          <div class="mb-2">
            <input type="text" name="button_text" class="form-control" placeholder="Button Text">
          </div>
          <div class="mb-2">
            <input type="text" name="button_link" class="form-control" placeholder="Button Link">
          </div>
          <button type="submit" class="btn btn-primary">Add Slide</button>
        </form>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  // Select all checkbox toggle
  document.getElementById('selectAll').addEventListener('change', function() {
    document.querySelectorAll('.select-slide').forEach(cb => cb.checked = this.checked);
  });

  // Bulk update slides
  document.getElementById('updateSlidesBtn').addEventListener('click', () => {
    const rows = [...document.querySelectorAll('#slidesForm tbody tr')];
    let updates = [];
    rows.forEach(row => {
      updates.push({
        id: row.dataset.id,
        title: row.querySelector('.title').value,
        subtitle: row.querySelector('.subtitle').value,
        button_text: row.querySelector('.button_text').value,
        button_link: row.querySelector('.button_link').value,
      });
    });

    fetch('{{ url('/sliders/bulk-update') }}', {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
      },
      body: JSON.stringify({ slides: updates })
    })
    .then(res => res.ok ? alert('✅ Slides updated!') : alert('❌ Failed to update slides'))
    .catch(() => alert('❌ Network error during update'));
  });

  // Bulk delete selected slides
  document.getElementById('deleteSlidesBtn').addEventListener('click', () => {
    if (!confirm('Delete selected slides?')) return;

    const selectedIds = [...document.querySelectorAll('.select-slide:checked')]
      .map(cb => cb.closest('tr').dataset.id);

    fetch('{{ url("/sliders/bulk-delete") }}', {
      method: 'POST', // Use POST with method override
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
        'X-HTTP-Method-Override': 'DELETE', // override method to DELETE
      },
      body: JSON.stringify({ ids: selectedIds })
    })
    .then(res => {
      if (res.ok) {
        alert('✅ Slides deleted!');
        selectedIds.forEach(id => {
          const row = document.querySelector(`tr[data-id="${id}"]`);
          if (row) row.remove();
        });
      } else {
        alert('❌ Failed to delete slides');
      }
    })
    .catch(() => alert('❌ Network error during delete'));
  });

  // Add new slide
  document.getElementById('addSlideForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('{{ url('/sliders') }}', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': token,
        'Accept': 'application/json',
      },
      body: formData
    })
    .then(async response => {
      const text = await response.text();
      console.log(text);

      if (response.ok) {
        alert('✅ Slide added! Refresh to see it.');
        this.reset();
      } else {
        alert('❌ Failed to add slide. Check console for details.');
      }
    })
    .catch(error => {
      console.error('❌ Network error:', error);
      alert('❌ Network error while adding slide.');
    });
  });
</script>

@endpush
