@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row p-3">
            <h1>{{__('Booking num: ' . $book->id)}}</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <img class="img-fluid rounded" src='/storage/{{ $book->event->image }}' alt="">
            </div>
            <div class="col-md-8">
                <div class="card" style="background-color: #fff0;border: none;">
                    <div class="card-body pl-5 pr-5">
                        <table class="table">
                            <thead class="table-borderless">
                            <tr rowspan="2">
                                <th>
                                    Camp
                                </th>
                                <th>
                                    Dada
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="col">
                                    ID
                                </th>
                                <td>
                                    {{ $book->id }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">
                                    Event
                                </th>
                                <td>
                                    {{ $book->event->name }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">
                                    Nom usuari
                                </th>
                                <td>
                                    {{ $book->user->name }}
                                </td>
                            </tr>

                            <tr>
                                <th scope="col">
                                    Email
                                </th>
                                <td>
                                    {{ $book->user->email }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">
                                    Preu
                                </th>
                                <td>
                                    @if($book->event->price != null)
                                        {{ $book->event->price }}
                                    @else
                                        Gratuït
                                    @endif
                                </td>
                                <td>
                                    @if($book->event->price != null)
                                        <form action="/">
                                            <button type="submit" name="price" value='{{ $event->price }}' class="btn btn-primary">Pay</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center p-5">
                    <a href="{{ route('booking.index') }}" class="">Tornar a la llista</a>
                </div>
            </div>
        </div>
    </div>

    @endsection
