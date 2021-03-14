<?php

namespace App\Services;

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

    public function auth(?string $code)
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