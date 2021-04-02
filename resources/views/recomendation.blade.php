@extends('layouts.app')

@section('title')
<title>{{ __('recomendation.result') }}</title>
@endsection

@section('content')
<div class="container">

@if (isset($result['error']))
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('recomendation.error') }}</div>
            <div class="card-body">
                <p><a href="{{ url('/') }}">back</a></p>
                <div class="form-group col-sm-12">
                    <p class="error-message text-danger">{{ $result['error'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('recomendation.result') }}</div>
                <div class="card-body">
                    <p><a href="{{ url('/') }}">back</a></p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('recomendation.number') }}</th>
                                <th scope="col">{{ __('recomendation.name') }}</th>
                                <th scope="col">{{ __('recomendation.uri') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $r)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $r['song'] }}</td>
                                <td><a href="{{ $r['uri'] }}">{{ $r['uri'] }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('playlist.create_title') }}</div>
                <div class="card-body">
                    {{ Form::open(['route' => ['playlist.store']]) }}

                        {{ Form::token() }}
                        {{ Form::hidden('limit', count($result)) }}
                        @foreach ($result as $r)
                            {{ Form::hidden('uri_' . ($loop->index + 1), $r['uri']) }}
                        @endforeach

                        {{-- Playlist Name --}}

                        <div class="form-group col-sm-12">
                            {{ Form::label('playlist_name','Playlist Name', []) }}
                            <span class="badge badge-danger">{{ __('mandatory') }}</span>
                            <small id="playlist_name_help" class="form-text text-muted">
                                {{ __('recomendation.playlist_name.tips') }}
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('playlist_name', null, [
                                'id'          => 'playlist_name',
                                'class'       => 'form-control',
                                'placeholder' => __('recomendation.playlist_name.placeholder'),
                            ])}}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::submit('Submit', [
                                'class' => 'btn btn-primary my-1'
                            ])}}
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
