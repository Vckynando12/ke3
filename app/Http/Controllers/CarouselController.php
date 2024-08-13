<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return view('admin.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('carousels', 'public');

        Carousel::create([
            'image' => $imagePath,
            'caption' => $request->caption,
        ]);

        return redirect()->route('admin.carousels.index')->with('success', 'Carousel added successfully.');
    }

    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($carousel->image) {
                Storage::disk('public')->delete($carousel->image);
            }

            $imagePath = $request->file('image')->store('carousels', 'public');
            $carousel->image = $imagePath;
        }

        $carousel->caption = $request->caption;
        $carousel->save();

        return redirect()->route('admin.carousels.index')->with('success', 'Carousel updated successfully.');
    }

    public function destroy(Carousel $carousel)
    {
        if ($carousel->image) {
            Storage::disk('public')->delete($carousel->image);
        }

        $carousel->delete();

        return redirect()->route('admin.carousels.index')->with('success', 'Carousel deleted successfully.');
    }
}
