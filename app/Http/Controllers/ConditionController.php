<?php

namespace App\Http\Controllers;

use App\Enums\Web;
use App\Facades\Spotify;
use App\Models\Genre;
use App\Services\SpotifyService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use SpotifyWebAPI\Request as SpotifyRequest;
use SpotifyWebAPI\Session as SpotifySession;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\SpotifyWebAPIAuthException;
use SpotifyWebAPI\SpotifyWebAPIException;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = [];
        foreach (Genre::all() as $genre) {
            $genres[] = $genre->name;
        }
        return view('condition', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $seedArtists = [];
        $seedTracks = [];

        foreach (range(1, 5) as $i) {
            $seedArtists[] = $req->input('seed_artists_0' . $i);
            $seedTracks[] = $req->input('seed_tracks_0' . $i);
        }

        session([
            'web'  => Web::RecommendationStore,
            'data' => [
                'seed_genres'  => $req->input('seed_genres'),
                'seed_artists' => $seedArtists,
                'seed_tracks'  => $seedTracks,
                'limit'        => $req->input('limit'),
                'min_tempo'    => $req->input('min_tempo'),
                'max_tempo'    => $req->input('max_tempo'),
            ],
        ]);
        Spotify::init($req);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
