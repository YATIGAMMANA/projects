<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationImage;

class LocationImageController extends Controller


{
    public function addimage()
    {
        return view('admin.addimage');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/assets/images');
        

        $locationImage = new LocationImage();
        $locationImage->title = $request->title;
        $locationImage->description = $request->description;
        $locationImage->longitude = $request->longitude;
        $locationImage->latitude = $request->latitude;
        $locationImage->image = basename($imagePath);
        $locationImage->save();
        
        return redirect()->route('admin.addimage')->with('success', 'Image added successfully!');
    }

    public function index()
    {
        $locationImages = LocationImage::all();
        return view('dashboard', compact('locationImages'));
    }
    public function dashboard()
    {
        $locationImages = LocationImage::all();
        return view('dashboard', compact('locationImages'));
    }
}


