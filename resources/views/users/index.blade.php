@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row mb-4">
            <h1>USERS</h1>
        </div>
    <div class="row d-flex justify-content-around ">
        <div class="col-md-10 table-responsive">
            <table class="table table-hover">
                <caption>Llista d'usuaris</caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>
                        <td class="row justify-content-end">
                            <div class="col-md-2 d-flex"><a href="{{ route('users.show', $user->id) }}"><button class="btn btn-dark">Veure</button></a></div>
                            <div class="col-md-2 d-flex"><a href="{{ route('users.edit', $user->id) }}"><button class="btn btn-primary">Editar</button></a></div>
                            <div class="col-md-2"><form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
