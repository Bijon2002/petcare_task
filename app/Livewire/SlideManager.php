<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SlideManager extends Component
{
    use WithFileUploads;

    public $sliders;
    public $showEditTable = false;
    public $selectAll = false;
    public $selected = [];
    public $editSlides = [];
    public $newImage, $newTitle, $newSubtitle, $newButtonText, $newButtonLink;

    protected $listeners = [
        'deleteConfirmed',
    ];

    public function mount()
    {
        $this->loadSlides();
    }

    public function loadSlides()
    {
        $this->sliders = Slider::all();
        $this->editSlides = $this->sliders->toArray();
    }

    public function toggleEditTable()
    {
        $this->showEditTable = !$this->showEditTable;
    }

    public function confirmDeleteSelected()
    {
        $this->dispatch('confirmDelete');
    }

    public function deleteConfirmed()
    {
        foreach ($this->selected as $id) {
            $slider = Slider::find($id);
            if ($slider) {
                if (Storage::disk('public')->exists($slider->image_path)) {
                    Storage::disk('public')->delete($slider->image_path);
                }
                $slider->delete();
            }
        }
        $this->selected = [];
        $this->loadSlides();
        $this->dispatch('showSuccess', ['message' => 'Selected slides deleted successfully.']);
    }

    public function bulkUpdate()
    {
        foreach ($this->editSlides as $slide) {
            $s = Slider::find($slide['id']);
            if ($s) {
                $s->update([
                    'title' => $slide['title'],
                    'subtitle' => $slide['subtitle'],
                    'button_text' => $slide['button_text'],
                    'button_link' => $slide['button_link'],
                ]);
            }
        }
        $this->loadSlides();
        $this->dispatch('showSuccess', ['message' => 'Slides updated successfully.']);
    }

    public function addSlide()
    {
        $this->validate([
            'newImage' => 'required',
            'newTitle' => 'nullable|string',
            'newSubtitle' => 'nullable|string',
            'newButtonText' => 'nullable|string',
            'newButtonLink' => 'nullable|url',
        ]);

        $path = $this->newImage->store('sliders', 'public');

        Slider::create([
            'image_path' => $path,
            'title' => $this->newTitle,
            'subtitle' => $this->newSubtitle,
            'button_text' => $this->newButtonText,
            'button_link' => $this->newButtonLink,
        ]);

        $this->reset(['newImage', 'newTitle', 'newSubtitle', 'newButtonText', 'newButtonLink']);
        $this->loadSlides();
        $this->dispatch('showSuccess', ['message' => 'New slide added successfully.']);
    }

    public function updatedSelectAll($value)
    {
        $this->selected = $value ? $this->sliders->pluck('id')->toArray() : [];
    }

    public function render()
    {
        return view('livewire.slide-manager');
    }
    public function toggleSelectAll()
{
    $this->selectAll = !$this->selectAll;

    $this->selected = $this->selectAll
        ? $this->sliders->pluck('id')->toArray()
        : [];
}

}
