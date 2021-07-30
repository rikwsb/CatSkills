@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create new opinion') }}</div>

                    <div class="card-body">
                        {{ $event->id }}
                        <form method="post" action='{{ route('opinions.store') }}' enctype='multipart/form-data'>
                            @csrf

                            <div class="form-group row">
                                <input type="hidden" name="id_event" id="id_event" value="{{$event->id}}">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcio') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Puntuacio') }}</label>

                                <div class="col-md-6">
                                    <input id="score" type="text" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ old('score') }}" required>

                                    @error('score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
