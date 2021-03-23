@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('recomendation.condition') }}</div>

                <div class="card-body">
                    {{Form::open(['route' => ['recomendation.store']])}}

                        {{Form::token()}}

                        <div class="form-group col-sm-12">
                            <p class="text-info">Seed Genres・Seed Artists・Seed Tracks を最大 5 つまで組み合わせてください</p>
                        </div>

                        {{-- Seed Genres --}}

                        <div class="form-group col-sm-12">
                            {{Form::label('seed_genres', 'Seed Genres', [])}}
                            <span class="badge badge-danger">必須</span>
                            <small id="seed_artists_help" class="form-text text-muted">
                                ジャンル
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::select('seed_genres', $genres, old('id'), [
                                'class'    => 'form-control',
                                'placeholder' => 'ジャンルを選択してください'
                            ])}}
                        </div>

                        {{-- Seed Artists --}}

                        <div class="form-group col-sm-12">
                            {{Form::label('seed_artists_01','Seed Artists', [])}}
                            <span class="badge badge-danger">必須</span>
                            <small id="seed_artists_help" class="form-text text-muted">
                                アーティスト名 Spotify URI
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_artists_01', 'spotify:artist:61VIpi1GmB7bTL3DCGWSlm', [
                                'id'          => 'seed_artists_01',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:61VIpi1GmB7bTL3DCGWSlm',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_artists_02', 'spotify:artist:4YXWn3AKqmiHMai9dZWuWK', [
                                'id'          => 'seed_artists_02',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:4YXWn3AKqmiHMai9dZWuWK',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_artists_03', 'spotify:artist:7nDfh01E30OkhgsPKSQzCx', [
                                'id'          => 'seed_artists_03',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:7nDfh01E30OkhgsPKSQzCx',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_artists_04', 'spotify:artist:4frHeZ2ummtLwkuV7QohYp', [
                                'id'          => 'seed_artists_04',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:4frHeZ2ummtLwkuV7QohYp',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_artists_05', 'spotify:artist:0Gvw849iPccKI428txR3yP', [
                                'id'          => 'seed_artists_05',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:artist:0Gvw849iPccKI428txR3yP',
                            ])}}
                        </div>

                        {{-- Seed Tracks --}}

                        <div class="form-group col-sm-12">
                            {{Form::label('seed_tracks_01', 'Seed Tracks', [])}}
                            <span class="badge badge-danger">必須</span>
                            <small id="seed_tracks_help" class="form-text text-muted">
                                曲名 Spotify URI
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_tracks_01', 'spotify:track:6ZtpesFDroMHMM8CG5LlhZ', [
                                'id'          => 'seed_tracks_01',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:6ZtpesFDroMHMM8CG5LlhZ',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_tracks_02', 'spotify:track:2yA4JMxbVHBBzMbKmVHH1s', [
                                'id'          => 'seed_tracks_02',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:2yA4JMxbVHBBzMbKmVHH1s',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_tracks_03', 'spotify:track:0QMqvJp8SZsjmGQJnMD9N0', [
                                'id'          => 'seed_tracks_03',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:0QMqvJp8SZsjmGQJnMD9N0',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_tracks_04', 'spotify:track:5HkpiHbmgH87yJwIGlS6ye', [
                                'id'          => 'seed_tracks_04',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:5HkpiHbmgH87yJwIGlS6ye',
                            ])}}
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('seed_tracks_05', 'spotify:track:6BURi8BvCkyFUKMQnmxjFg', [
                                'id'          => 'seed_tracks_05',
                                'class'       => 'form-control',
                                'placeholder' => 'spotify:track:6BURi8BvCkyFUKMQnmxjFg',
                            ])}}
                        </div>

                        {{-- Limit --}}

                        <div class="form-group col-sm-12">
                            {{Form::label('limit','Limit', [])}}
                            <span class="badge badge-warning">任意</span>
                            <small id="limit" class="form-text text-muted">
                                曲数 ※ 最大値 20
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('limit', '10', [
                                'id'    => 'limit',
                                'class' => 'form-control',
                            ])}}
                        </div>

                        {{-- Min Tempo --}}

                        <div class="form-group col-sm-12">
                            {{Form::label('min_tempo', 'Min Tempo', [])}}
                            <span class="badge badge-warning">任意</span>
                            <small id="min_tempo_help" class="form-text text-muted">
                                最低テンポ
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('min_tempo', '', [
                                'id'          => 'min_tempo',
                                'class'       => 'form-control',
                                'placeholder' => '80',
                            ])}}
                        </div>

                        {{-- Max Tempo --}}

                        <div class="form-group col-sm-12">
                            {{Form::label('max_tempo', 'Max Tempo', [])}}
                            <span class="badge badge-warning">任意</span>
                            <small id="max_tempo_help" class="form-text text-muted">
                                最大テンポ
                            </small>
                        </div>
                        <div class="form-group col-sm-12">
                            {{Form::text('max_tempo', '', [
                                'id'          => 'max_tempo',
                                'class'       => 'form-control',
                                'placeholder' => '120',
                            ])}}
                        </div>

                        <div class="form-group col-sm-12">
                            {{Form::submit('Submit', [
                                'class' => 'btn btn-primary my-1'
                            ])}}
                        </div>

                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
