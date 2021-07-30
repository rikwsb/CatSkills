@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}</div>

                    <div class="card-body pl-5 pr-5">

                            <form method="post" enctype="multipart/form-data" action="{{ route('users.update', $user->id)}}">
                                @csrf
                                @method('patch')

                                <div class="form-group row">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" />
                                    @error('name')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" />
                                    @error('email')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="password">Contrasenya</label>
                                    <input type="password" class="form-control" name="password" id="password" />
                                    @error('password')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                @if($user->type == 'admin')
                                <div class="form-group row">
                                    <label for="type">Rol</label>
                                    <select class="form-control" name="type" id="type" value="{{ old('type', $user->type) }}">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    @error('type')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                @endif


                                <div class="form-group row">
                                <label for="type">Telefon</label>
                                <input type="text" class="form-control" name="phone" id="phone" value='{{ $user->phone }}' />
                                    @error('phone')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="form-group row">
                                    <label for="postal_code">Codi Postal</label>
                                    <input type="text" class="form-control" name="postal_code" id="postal_code" value='{{ $user->postal_code }}'/>
                                    @error('postal_code')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="flex form-group items-center justify-end row">
                                    <button type="submit" class="btn btn-primary">
                                        Editar
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
