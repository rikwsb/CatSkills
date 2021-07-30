<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function create(Request $request){

        $event = Event::find($request->event);

        return view('opinions/create',[
            'event' => $event
        ]);
    }

    public function store(Request $request){

        $data = request()->validate([
            'description' => 'required',
            'score' => 'required',
        ]);

        $event = Event::find($request->id_event);

        $opinion = new Opinion(array_merge($data, [
            'id_user' => auth()->user()->getAuthIdentifier(),
            'id_event' => $event->id
        ]));
        $opinion->save();

        return redirect()->route('home');

    }
}
