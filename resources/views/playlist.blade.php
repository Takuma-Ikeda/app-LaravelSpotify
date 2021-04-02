@extends('layouts.app')

@section('title')
<title>{{ __('playlist.title') }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('playlist.header') }}</div>

                <div class="card-body">
                    <p><a href="{{ url('/') }}">back</a></p>
                    <p>{{ __('playlist.result') }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('playlist.uri') }}</th>
                                <th scope="col">{{ __('playlist.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle"><a href="{{ $playlistUri }}">{{ $playlistUri }}</a></td>
                                <td>
                                    {{ Form::open(['route' => ['playlist.destroy', $playlistUri], 'method' => 'delete']) }}
                                        {{ Form::token() }}
                                        {{ Form::submit('Unfollow', [
                                            'class' => 'btn btn-danger'
                                        ])}}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
