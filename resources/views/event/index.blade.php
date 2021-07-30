@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-around mb-2">
            <h1>Upcoming events</h1>
            <a href={{ route('events.create') }}><button class="btn btn-primary">Crear</button></a>
        </div>

        <div class="row d-flex justify-content-around">
            @foreach($events as $event)
                <div class="card p-0 mb-4" style="width: 19em !important;">
                    <img class="card-img-top" src="/storage/{{ $event->image }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ $event->desc }}</p>
                        <p class="card-text">{{ $event->date }}</p>
                        <p class="card-text">{{ $event->place->id }}</p>
                        <div class="row justify-content-around">
                            <div><a href="{{ route('events.show', $event->id) }}"><button class="btn btn-dark">View</button></a></div>
                            <div><a href="{{ route('events.edit', $event->id) }}"><button class="btn btn-primary">Edit</button></a></div>
                            <div><form class="inline-block" action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
