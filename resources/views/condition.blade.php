@extends('layouts.app')

@section('title')
<title>{{ __('condition.title') }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('condition.header') }}</div>

                <div class="card-body">
                    {{ Form::open(['route' => ['condition.store']]) }}

                        {{ Form::token() }}

                        <div class="form-group col-sm-12">
                            <p class="text-info">{{ __('condition.info') }}</p>
                        </div>

                        @if ($errors->has('seed'))
                            <div class="form-group col-sm-12">
                                <p class="error-message text-danger">{{ $errors->first('seed') }}</p>
                            </div>
                        @endif

                        {{-- Seed Genres --}}

                        <div class="form-group col-sm-12">
                            {{ Form::label('seed_genres', 'Seed Genres', []) }}
                            <span class="badge badge-danger">{{ __('mandatory') }}</span>
                            <small id="seed_artists_help" class="form-text text-muted">
                            {{ __('condition.gunre.tips') }}
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::select('seed_genres', $genres, old('id'), [
                                'class'    => 'form-control',
                                'placeholder' =>  __('condition.gunre.placeholder')
                            ])}}
                        </div>

                        {{-- Seed Artists --}}

                        <div class="form-group col-sm-12">
                            {{ Form::label('seed_artists_1','Seed Artists', []) }}
                            <span class="badge badge-danger">{{ __('mandatory') }}</span>
                            <small id="seed_artists_help" class="form-text text-muted">
                                {{ __('condition.seed_artists.tips') }}
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_artists_1', '', [
                                'id'          => 'seed_artists_1',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:61VIpi1GmB7bTL3DCGWSlm',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_artists_2', '', [
                                'id'          => 'seed_artists_2',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:4YXWn3AKqmiHMai9dZWuWK',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_artists_3', '', [
                                'id'          => 'seed_artists_3',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:7nDfh01E30OkhgsPKSQzCx',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_artists_4', '', [
                                'id'          => 'seed_artists_4',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:4frHeZ2ummtLwkuV7QohYp',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_artists_5', '', [
                                'id'          => 'seed_artists_5',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:0Gvw849iPccKI428txR3yP',
                            ])}}
                        </div>

                        {{-- Seed Tracks --}}

                        <div class="form-group col-sm-12">
                            {{ Form::label('seed_tracks_1', 'Seed Tracks', []) }}
                            <span class="badge badge-danger">{{ __('mandatory') }}</span>
                            <small id="seed_tracks_help" class="form-text text-muted">
                                {{ __('condition.seed_tracks.tips') }}
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_tracks_1', '', [
                                'id'          => 'seed_tracks_1',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:6ZtpesFDroMHMM8CG5LlhZ',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_tracks_2', '', [
                                'id'          => 'seed_tracks_2',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:2yA4JMxbVHBBzMbKmVHH1s',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_tracks_3', '', [
                                'id'          => 'seed_tracks_3',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:0QMqvJp8SZsjmGQJnMD9N0',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_tracks_4', '', [
                                'id'          => 'seed_tracks_4',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:5HkpiHbmgH87yJwIGlS6ye',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('seed_tracks_5', '', [
                                'id'          => 'seed_tracks_5',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:6BURi8BvCkyFUKMQnmxjFg',
                            ])}}
                        </div>

                        {{--
                            ※ Option の種類
                            limit: 実装済み
                            market
                            min_acousticness
                            max_acousticness
                            target_acousticness
                            min_danceability
                            max_danceability
                            target_danceability
                            min_duration_ms
                            max_duration_ms
                            target_duration_ms
                            min_energy
                            max_energy
                            target_energy
                            min_instrumentalness
                            max_instrumentalness
                            target_instrumentalness
                            min_key
                            max_key
                            target_key
                            min_liveness
                            max_liveness
                            target_liveness
                            min_loudness
                            max_loudness
                            target_loudness
                            min_mode
                            max_mode
                            target_mode
                            min_popularity
                            max_popularity
                            target_popularity
                            min_speechiness
                            max_speechiness
                            target_speechiness
                            min_tempo: 実装済み
                            max_tempo: 実装済み
                            target_tempo
                            min_time_signature
                            max_time_signature
                            target_time_signature
                            min_valence
                            max_valence
                            target_valence
                        --}}

                        {{-- Limit --}}

                        <div class="form-group col-sm-12">
                            {{ Form::label('limit','Limit', []) }}
                            <span class="badge badge-warning">{{ __('optional') }}</span>
                            <small id="limit" class="form-text text-muted">
                                {{ __('condition.limit.tips') }}
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('limit', $limit, [
                                'id'    => 'limit',
                                'class' => 'form-control',
                            ])}}
                        </div>
                        @if ($errors->has('limit'))
                            <div class="form-group col-sm-12">
                                <p class="error-message text-danger">{{ $errors->first('limit') }}</p>
                            </div>
                        @endif

                        {{-- Min Tempo --}}

                        <div class="form-group col-sm-12">
                            {{ Form::label('min_tempo', 'Min Tempo', []) }}
                            <span class="badge badge-warning">{{ __('optional') }}</span>
                            <small id="min_tempo_help" class="form-text text-muted">
                                {{ __('condition.min_tempo.tips') }}
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('min_tempo', '', [
                                'id'          => 'min_tempo',
                                'class'       => 'form-control',
                                'placeholder' => '80',
                            ])}}
                        </div>
                        @if ($errors->has('min_tempo'))
                            <div class="form-group col-sm-12">
                                <p class="error-message text-danger">{{ $errors->first('min_tempo') }}</p>
                            </div>
                        @endif

                        {{-- Max Tempo --}}

                        <div class="form-group col-sm-12">
                            {{ Form::label('max_tempo', 'Max Tempo', []) }}
                            <span class="badge badge-warning">{{ __('optional') }}</span>
                            <small id="max_tempo_help" class="form-text text-muted">
                                {{ __('condition.max_tempo.tips') }}
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::text('max_tempo', '', [
                                'id'          => 'max_tempo',
                                'class'       => 'form-control',
                                'placeholder' => '120',
                            ])}}
                        </div>
                        @if ($errors->has('max_tempo'))
                            <div class="form-group col-sm-12">
                                <p class="error-message text-danger">{{ $errors->first('max_tempo') }}</p>
                            </div>
                        @endif

                        {{-- Mode --}}

                        <div class="form-group col-sm-12">
                            {{ Form::label('mode', 'Mode', []) }}
                            <span class="badge badge-warning">{{ __('optional') }}</span>
                            <small id="mode_help" class="form-text text-muted">
                                {{ __('condition.mode.tips') }}
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::select('modes', [1 => __('condition.mode.major'), 0 => __('condition.mode.minor')], null, [
                                'class'    => 'form-control',
                                'placeholder' => __('condition.mode.placeholder')
                            ])}}
                        </div>

                        <div class="form-group col-sm-12">
                            {{Form::submit('Submit', [
                                'class' => 'btn btn-primary my-1'
                            ])}}
                        </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
