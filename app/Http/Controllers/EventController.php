<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\User;
use App\Models\Event;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{

    public function home(){
        $events = Event::all();

        return view('home', [
            'events' => $events
        ]);
    }

    public function search($event){
        $events = Event::where('name', '=', '%' . $event . '%');

        return view('home', [
            'events' => $events
        ]);
    }

    public function index(){
        $events = Event::all();

        return view('event/index', [
            'events' => $events
        ]);
    }

    public function create(){
        return view('event\create', [
            'places' => Place::all(),
        ]);
    }

    public function show($event){

        $event = Event::findOrFail($event);
        $comentaries = Opinion::where('id_event', '=', $event->id)->get();

        return view('event/show',[
            'event' => $event,
            'comentarios' => $comentaries
        ]);
    }

    public function store(){
        $data = \request()->validate([
           'name' => 'required',
           'desc' => '',
           'date' => 'required',
            'hour' => 'required',
            'people_max' => 'required',
            'id_place' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
        $image->save();

//        $imagePath = time() . 'event_photo.' . $data['image']->extension();
//        $data['image']->move(public_path('storage/uploads'),$imagePath);

        $newData = array_merge($data, ['image' => $imagePath]);

        $event = new Event($newData);
        $event->save();

        return redirect()->route('home');
    }

    public function edit(\App\Models\Event $event){
        return view('event/edit', compact('event'), ['places' => Place::all()]);
    }

    public function update(Event $event){
        $data = \request()->validate([
            'name' => 'required',
            'desc' => '',
            'date' => '',
            'id_place' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
        $image->save();

//        dd($data);

        $event->update(
            [
                'name' => $data['name'],
                'desc' => $data['desc'],
                'date' => $data['date'],
                'id_place' => $data['id_place'],
                'image' => $imagePath
            ]
        );
        return redirect()->route('events.index');
    }

}
