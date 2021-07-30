@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nova reserva') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('booking.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row d-flex justify-content-arround">
                                <div class="col-md-6"><h5>Vols reservar el event {{ $event->name }} ?</h5></div>
                                <input type="hidden" name="id_event" id="id_event" value='{{ $event->id }}'>

{{--                                <label for="places" class="col-md-4 col-form-label text-md-right"></label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <p name="id_event" id="id_event" class="form-select">{{ $event->name }}</p>--}}
{{--                                    <select name="id_event" class="form-select" aria-label="Default select example">¡--}}
{{--                                        <option selected>Open this select menu</option>--}}
{{--                                        @foreach($events as $event)--}}
{{--                                            <option value={{ $event->id }}>{{ $event->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @if(isset($error))--}}
{{--                                        <p class="alert-danger">{{ $error }}</p>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                                    <div class="col-md-6 align-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirmar') }}
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
