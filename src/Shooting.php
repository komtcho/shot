<?php

namespace Komtcho\Shot;

use Illuminate\Support\Facades\Http;
use Komtcho\Shot\Contracts\IShooting;
use Komtcho\Shot\Contracts\ShootingGet;
use Komtcho\Shot\Contracts\ShootingPost;
use Komtcho\Shot\Contracts\WithHeaders;

abstract class Shooting implements IShooting
{
    /**
     * The URL.
     *
     * @var string|null
     */
    protected $url = null;

    /**
     * Method for the call request.
     */
    public function call()
    {
        $headers = ($this instanceof WithHeaders) ? $this->headers() : [];

        if ($this instanceof ShootingPost) {
            $response = Http::withHeaders($headers)
                ->post($this->url, $this->body());
        }

        if ($this instanceof ShootingGet) {
            $response = Http::withHeaders($headers)
                ->get($this->url, $this->query());
        }

        return $this->response($response->json());
    }

    /**
     * Handle response.
     */
    public function response($body)
    {
        return $body;
    }
}
