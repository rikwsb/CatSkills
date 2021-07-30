@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-around">

{{--    <div class="row">--}}

{{--        <div class="col-md-7">--}}
{{--            <h2>Event</h2>--}}
{{--            <h1>Backinham Palace</h1>--}}
{{--            <p>4.94 (128) · Londres, England</p>--}}
{{--            <hr>--}}
{{--            <button type="button" class="rounded btn btn-light btn-dark">Check availability</button>--}}
{{--        </div>--}}

{{--        <div class="col-md-5">--}}
{{--            <img src="\storage\mountain.jpg" class="rounded w-100" alt="">--}}
{{--        </div>--}}

{{--    </div>--}}

    <div class="col-md-6">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="/storage/{{$event->image}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$event->name}}</h5>
                <p class="card-text">{{$event->desc}}</p>
                <p class="c>ard-text"><strong>Place:</strong> {{$event->place->name}}</p>
                <p class="card-text"><strong>Max personas:</strong> {{$event->people_max}}</p>
                <p class="card-text"><strong>Preu:</strong>  @if($event->price != null)
                        {{ $event->price }}
                    @else
                        Free
                    @endif</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{ $event->date }}</small> &nbsp;&nbsp; <small class="text-muted">{{ $event->hour }}</small>
                </div>
                <hr>
                <div class="p-3 row">
                    <h5>Comentarios</h5>
                </div>

                @foreach($comentarios as $comentario)
                    <h5 class="card-title">{{$comentario->user->name}}</h5>
                    <p>{{$comentario->description}}</p>
                    <span>Nota: {{$comentario->score}}</span>
                @endforeach

                <a href={{route('opinions.create', ['event' => $event->id])}}><button class="btn btn-sm btn-outline-secondary">Afegir comentari</button></a>

            </div>
        </div>
    </div>

</div>

@endsection
