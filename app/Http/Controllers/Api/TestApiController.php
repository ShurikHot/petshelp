<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestApiController extends Controller
{

    public function weatherApi()
    {
        $options = [
            'appid' => '32ed0ce742d8712b8a77fd47642813aa',
            'q' => 'Madrid',
            'lang' => 'ua',
            'units' => 'metric',
        ];

        $url = 'https://api.openweathermap.org/data/2.5/weather';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($options));


        $res = curl_exec($ch);
        $data = json_decode($res, true);
        curl_close($ch);

        return $data;
    }

    public function spotifyApi($artist_id)
    {
        $token = $this->getSpotifyToken();
        $access_token = $token['access_token'];

        $artist_id = '0k17h0D3J5VfsdmQ1iZtE9';

        $url = 'https://api.spotify.com/v1/artists/' . $artist_id;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer  $access_token",
        ]);

        $res = curl_exec($ch);
        $data = json_decode($res, true);
        curl_close($ch);

        return $data;
    }

    private function getSpotifyToken()
    {
        $options = [
            'grant_type' => 'client_credentials',
            'client_id' => 'f14c41a3cc2c4bf799a1e42872128ebd',
            'client_secret' => 'ad8fd6ee783a400e98e1ba433b7d0f46',
        ];

        $url = 'https://accounts.spotify.com/api/token';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($options));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/x-www-form-urlencoded",
        ]);

        $res = curl_exec($ch);
        $data = json_decode($res, true);
        curl_close($ch);

        return $data;
    }
}
