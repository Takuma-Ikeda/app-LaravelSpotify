<?php

namespace App\Services;

use App\Enums\Web;
use App\Models\Genre;
use Illuminate\Http\Request;
use SpotifyWebAPI\Request as SpotifyRequest;
use SpotifyWebAPI\Session as SpotifySession;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\SpotifyWebAPIAuthException;
use SpotifyWebAPI\SpotifyWebAPIException;

class SpotifyService
{

    private $api;
    private $code;
    private $session;

    public function getSpotifyWebAPI(): SpotifyWebAPI
    {
        return $this->api;
    }

    public function getSpotifySession(): SpotifySession
    {
        return $this->session;
    }

    public function init(Request $req): SpotifyWebAPI
    {
        $this->auth($req->input('code'));
        $this->getSpotifySession();
        return $this->getSpotifyWebAPI();
    }

    public function execute(SpotifyWebAPI $api, string $web, array $data = []): array
    {
        $result = [];
        switch ($web) {
            case Web::PlaylistStore:
                $recommendations = $api->getRecommendations([
                    'limit'        => $data['limit'],
                    'seed_artists' => $data['seed_artists'],
                    'seed_genres'  => $data['seed_genres'],
                    'seed_tracks'  => $data['seed_tracks'],
                    'min_tempo'    => $data['min_tempo'],
                    'max_tempo'    => $data['max_tempo'],
                ]);

                $tracks = $recommendations->tracks;
                foreach ($tracks as $t) {
                    $result[] = [
                        'song' => $t->name,
                        'uri'  => $t->uri,
                    ];
                }

                // dd($recommendations);

                break;
            case Web::GenreCreate:
                $genre = new Genre();
                $genre->createBySeeds($api);
                break;
        }
        return $result;
    }

    private function auth(?string $code)
    {
        if (!isset($code)) {
            $location = $this->createSpotifySession()->getAuthorizeUrl([
                'scope' => [
                    'playlist-read-private',
                    'playlist-modify-private',
                    'user-read-private',
                    'playlist-modify',
                    'user-top-read'
                ]
            ]);
            return redirect()->to($location)->send();
        }
        $this->code = $code;
        $this->setSpotifySession();
        $this->setSpotifyWebAPI();
    }

    private function setSpotifyWebAPI(): void
    {
        $api = new SpotifyWebAPI();
        $session = $this->getSpotifySession();
        $api->setAccessToken($session->getAccessToken());
        $this->api = $api;
    }

    private function setSpotifySession(): void
    {
        $session = $this->createSpotifySession();
        $session->requestAccessToken($this->code);
        $this->session = $session;
    }

    private function createSpotifySession(): SpotifySession
    {
        return new SpotifySession(
            config('spotify.yourClientId'),
            config('spotify.yourClientSecret'),
            config('spotify.yourRedirectUri')
        );
    }
}
