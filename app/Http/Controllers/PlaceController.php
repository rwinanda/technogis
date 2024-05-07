<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;


class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('places.place', [
            'places' => Place::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $validatedData = $request->validate([
            'name' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        Place::create($validatedData);
        return redirect('/place')->with('success', 'New Place has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        
        $geojson = [
            'type' => 'FeautureCollection',
            'features' => [
                    [
                    'type' => 'Feature',
                    'properties' => [],
                    'geometry' => [
                        'type' => 'Polygon',
                        'coordinates' => [
                            [
                                [$place->longitude, $place->latitude]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        // mengambil data geojson dari file public
        $geojson_new = json_decode(file_get_contents(public_path('maps/xample1.geojson')), true);
        $geojsonData['features'] = array_merge($geojson_new['features'], $geojson['features']);

        return view('places.show', [
            'place' => $place,
            'geojson' => $geojsonData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        return view('places.edit',[
            'place' => $place
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $ruler = $request->validate([
            'name' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        
        $place->update($ruler);
        return redirect('/place')->with('success', 'Place has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        Place::destroy($place->id);
        return redirect('/place')->with('success', 'Post Has Been Deleted!');
    }
}
