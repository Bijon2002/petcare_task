<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage; // ✅ Required for delete checks

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('home', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|url',
        ]);

        // ✅ Correct storage to 'sliders' on 'public' disk
        $path = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'image_path' => $path, // ✅ Directly stores 'sliders/filename.jpg'
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
        ]);

        return response()->json(['message' => 'Slide added'], 200);
    }

   public function bulkUpdate(Request $request)
{
    $updates = $request->input('slides');

    foreach ($updates as $update) {
        $slide = Slider::findOrFail($update['id']); // may error if 'id' missing
        $slide->update([
            'title' => $update['title'],
            'subtitle' => $update['subtitle'],
            'button_text' => $update['button_text'],
            'button_link' => $update['button_link'],
        ]);
    }

    return response()->json(['message' => 'Slides updated'], 200);
}


    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // ✅ Delete image file if it exists
        if (Storage::exists('public/' . $slider->image_path)) {
            Storage::delete('public/' . $slider->image_path);
        }

        $slider->delete();

        return response()->json(['message' => 'Slide deleted'], 200);
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return response()->json(['message' => 'Invalid IDs'], 400);
        }

        $sliders = Slider::whereIn('id', $ids)->get();

        foreach ($sliders as $slider) {
            if (Storage::exists('public/' . $slider->image_path)) {
                Storage::delete('public/' . $slider->image_path);
            }
            $slider->delete();
        }

        return response()->json(['message' => 'Slides deleted'], 200);
    }
}
