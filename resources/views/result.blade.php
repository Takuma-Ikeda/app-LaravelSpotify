@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('playlist.result') }}</div>

                <div class="card-body">
                    <a href="{{ url('/playlist') }}"><{{ __('playlist.condition') }}</a>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">曲名</th>
                                <th scope="col">URI</th>
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
</div>
@endsection
