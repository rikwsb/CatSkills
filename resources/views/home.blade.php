@extends('layouts.app')
@section('content')

{{--<div class="container">--}}
{{--    <div class="row justify-content-around mb-2">--}}
{{--        <h1>Dashboard</h1>--}}
{{--    </div>--}}

{{--    <div class="row d-flex justify-content-around">--}}
{{--        @foreach($events as $event)--}}
{{--            <div class="card p-0 mb-4" style="width: 19em !important;">--}}
{{--                <img class="card-img-top" src="storage/{{ $event->image }}" alt="Card image cap">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">{{ $event->name }}</h5>--}}
{{--                    <p class="card-text">{{ $event->desc }}</p>--}}
{{--                    <button type="submit" name="event_id" value="{{ $event->id }}" class="btn btn-primary">Reserve</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}

{{--</div>--}}

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Catskills</h1>
            <p class="lead text-muted">Página de la competició per als CatSkills</p>
            @if(auth()->user()->type == 'admin')
            <p>
                <a href="{{route('users.index')}}" class="btn btn-primary my-2">Users</a>
                <a href="{{route('events.index')}}" class="btn btn-primary my-2">Events</a>
                <a href="{{route('places.index')}}" class="btn btn-primary my-2">Llocs</a>
{{--                <a href="{{route('booking.create')}}" class="btn btn-secondary my-2">Reservar</a>--}}
            </p>
            @endif
            <a href="{{route('booking.index')}}" class="btn btn-secondary my-2">Reserves</a>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
{{--            <form name="search-form" type="get">--}}
{{--                <div class="form-group row">--}}
{{--                    <label for="event-search" class="col-md-4 col-form-label text-md-right">{{ __('Buscar event') }}</label>--}}

{{--                    <div class="col-md-6">--}}
{{--                        <input id="event-search" type="text" class="form-control" name="event-search">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

            <div class="row">
                @foreach($events as $event)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="/storage/{{$event->image}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$event->name}}</h5>
                            <p class="card-text">{{$event->desc}}</p>
                            <p class="card-text"><strong>Place:</strong> {{$event->place->name}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
{{--                                    <form method="get" action="{{ route('booking.create') }}" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}

{{--                                        <button type="submit" name="id_event" value="{{ $event->id }}" class="btn btn-sm btn-outline-secondary">Reserve</button>--}}
{{--                                    </form>--}}
                                    <a href={{route('booking.create', ['event' => $event->id])}}><button class="btn btn-sm btn-outline-secondary">Reservar</button></a>
                                    &nbsp;&nbsp;
                                    <a href="{{ route('events.show', $event->id) }}"><button type="button" name="event_id" value="{{ $event->id }}" class="btn btn-sm btn-outline-secondary">Veure</button></a>
                                </div>
                                <small class="text-muted">{{ $event->date }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</main>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src = "js/ajax.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection
