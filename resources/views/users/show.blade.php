@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between  pt-4">
                        <h5>{{ __($user->name) }}</h5>
                        @if($user->id == auth()->user()->getAuthIdentifier() || $user->type == 'admin')
                        <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                        @endif
                    </div>
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
                                @if($user->id == auth()->user()->getAuthIdentifier() || $user->type == 'admin')
                                <tr>
                                    <th scope="col">
                                        ID
                                    </th>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        Nom
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        Email
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        DNI
                                    </th>
                                    <td>
                                        {{ $user->dni }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        Codi Postal
                                    </th>
                                    <td>
                                        {{ $user->postal_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        Telefon
                                    </th>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                </tr>
                                @else
                                    <tr>
                                        <th scope="col">
                                            No tienes permisos para ver a este usuario
                                        </th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="text-center p-5">
                    <a href="{{ route('users.index') }}" class="">Tornar a la llista</a>
                </div>
            </div>
        </div>
    </div>
@endsection
