<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewMore;


class ViewMoreController extends Controller
{
    public function addLocation()
    {
        return view('admin.viewmore');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'places' => 'required|image|max:2048',
            'activities' => 'required|image|max:2048',
            'hotels' => 'required|image|max:2048',
            'restaurants' => 'required|image|max:2048',
        ]);

        $placesPath = $request->file('places')->store('public/assets/images');
        $activitiesPath = $request->file('activities')->store('public/assets/images');
        $hotelsPath = $request->file('hotels')->store('public/assets/images');
        $restaurantsPath = $request->file('restaurants')->store('public/assets/images');

        $viewMore = new ViewMore();
        $viewMore->title = $request->title;
        $viewMore->description = $request->description;
        $viewMore->places = basename($placesPath);
        $viewMore->activities = basename($activitiesPath);
        $viewMore->hotels = basename($hotelsPath);
        $viewMore->restaurants = basename($restaurantsPath);
        $viewMore->save();

        return redirect()->route('admin.viewmore')->with('success', 'Location added successfully!');
    }

    public function index()
    {
        $viewMores = ViewMore::all();
        return view('dashboard', compact('viewMores'));
    }

    public function dashboard()
    {
        $viewMores = ViewMore::all();
        return view('dashboard', compact('viewMores'));
    }

    public function show($title)
    {
        $locationImage = viewMore::where('title',$title)->first();
       
        return view('admin.viewmore1', compact('locationImage'));
    }

    

    //  public function viewMores(Request $request){
    //      $viewMore = viewmore::all();
    //      return view('admin.viewmore1', compact('viewmore'));
    //  }
}


