<?php

namespace App\Http\Controllers;

use App\Enums\Web;
use App\Facades\Spotify;
use App\Services\SpotifyService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use SpotifyWebAPI\Request as SpotifyRequest;
use SpotifyWebAPI\Session as SpotifySession;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\SpotifyWebAPIAuthException;
use SpotifyWebAPI\SpotifyWebAPIException;

class GenreSeedsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        // http://localhost/genre/create/
        session(['web' => Web::GenreCreate]);
        session(['data' => []]);
        Spotify::init($req);
    }
}
