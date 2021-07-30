<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PlaceController extends Controller
{

    public function index(){
        $places = Place::all();
        return view('place/index', [
            'places' => $places
        ]);
    }

    public function create(){
        return view('place/create');
    }

    public function show($place){

        $event = Place::findOrFail($place);

        return view('place/show',[
            'place' => $place,
        ]);
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'street' => 'required',
            'surface' => 'required',
        ]);

        $place = new Place($data);
        $place->save();

        return redirect()->route('home');

    }

    public function edit(\App\Models\Place $place){
        return view('place/edit', compact('place'), ['places' => Place::all()]);
    }

    public function update(Place $place){
        $data = \request()->validate([
            'name' => 'required',
            'street' => 'required',
            'surface' => 'required|integer'
        ]);

        $place->update(
            [
                'name' => $data['name'],
                'street' => $data['street'],
                'surface' => $data['surface']
            ]
        );
        return redirect()->route('places.index');
    }
}
