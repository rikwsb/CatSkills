<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Event;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware(['routeMiddleware' => 'admin'])->only(['index','store', 'destroy']);
//    }

    public function create(Request $request){

        $event = Event::find($request->event);

        return view('booking/create', compact('event'));
    }

    public function show(\App\Models\Booking $booking){
        return view('booking/show', [
            'book' => $booking,
        ]);
    }

    public function index(){
        if(auth()->user()->type == 'admin'){
            $bookings = Booking::all();
        } else {
            $bookings = Booking::where('id_user', '=', auth()->user()->getAuthIdentifier())->get();
        }
        return view('booking/index', [
           'bookings' => $bookings,
        ]);
    }

    public function store(){
//      dd(auth()->user()->getAuthIdentifier());
        $data = \request();

        $event = Event::findOrFail($data['id_event']);
        $user = User::findOrFail(auth()->user()->getAuthIdentifier());

        $people_max = Booking::where('id_event', '=', $data['id_event'])->count();

        if($people_max<= $event->people_max){
            $booking = new Booking([
                'id_user' => $user->id,
                'id_event' => $event->id,
                'date' => $event->date,
                'reserve_name' => $user->name
            ]);
            $booking->save();

            return redirect('/booking/' . $booking->id);
        } else {
            return view('booking/create', [
                'events' => Event::all(),
                'error' => 'Aforament esgotat'
            ]);
        }

        dd($people_max);

    }

    public function destroy(Booking $booking)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $booking->delete();

        return redirect()->route('booking.index');
    }
}
