<?php

namespace AtlasByte\Common;

use GuzzleHttp\Client;

class HttpClient
{

    private string $baseClientURI;
    private Client $client;

    /**
     * The HTTP client is used in every gateway class to make HTTP requests. It is a common interface
     * to make it easier to send requests and deal with specific authentication flows
     * @param string $baseClientURI Base uri for client requests
     */
    public function __construct(string $baseClientURI)
    {
        $this->baseClientURI = $baseClientURI;
    }




}