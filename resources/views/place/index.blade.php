@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-2"><h1>Llocs</h1></div>
            <div class="col-md-2"><a href='{{ route('places.create') }}'><button class="btn btn-primary">Crear</button></a></div>
        </div>
    <div class="row d-flex justify-content-around ">
        <div class="col-md-10 table-responsive">
            <table class="table table-hover">
                <caption>Llista de llocs</caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Descripcio</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($places as $place)
                    <tr>
                        <th scope="row">{{$place->id}}</th>
                        <td>{{$place->name}}</td>
                        <td>{{$place->desc}}</td>
                        <td class="row justify-content-end">
                            <div class="col-md-2 d-flex"><a href="{{ route('places.edit', $place->id) }}"><button class="btn btn-primary">Edit</button></a></div>
                            <div class="col-md-2"><form class="inline-block" action="{{ route('places.destroy', $place->id) }}" method="POST" onsubmit="return confirm('Estas segur que ho vols esborrar?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

@endsection
