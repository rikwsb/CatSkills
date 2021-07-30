@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row mb-4">
            <h1>BOOKINGS</h1>
        </div>
        <div class="row d-flex justify-content-around ">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover">
                    <caption>Llista de reserves</caption>
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">#</th>
                        <th scope="col">Nom usuari</th>
                        <th scope="col">Mail usuari</th>
                        <th scope="col">Event</th>
                        <th scope="col">Lloc</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($bookings->count() != 0 || $bookings == null)
                        @foreach($bookings as $book)
                            <tr>
                                <th scope="row"><img class="img-fluid rounded" style="width: 3em;" src='/storage/{{$book->event->image}}' alt=""></th>
                                <th scope="row">{{$book->id}}</th>
                                <td>{{$book->user->name}}</td>
                                <td>{{$book->user->email}}</td>
                                <td>{{$book->event->name}}</td>
                                <td>{{$book->event->place->name}}</td>
                                <td class="row justify-content-end">
                                    <div class="col-md-9 d-flex justify-content-around">
                                        <a href="{{ route('booking.show', $book->id) }}"><button class="btn btn-dark">Veure</button></a>
                                        <a href="{{ route('booking.edit', $book->id) }}"><button class="btn btn-primary">Editar</button></a>
                                        <form class="inline-block" action="{{ route('booking.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Estas segur?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

