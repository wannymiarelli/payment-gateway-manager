<?php

namespace AtlasByte\Common\Http;

use AtlasByte\Common\ApiUriResolver;
use GuzzleHttp\Client;

class HttpClient extends AbstractHttpClient
{

    private Client $client;
    private ApiUriResolver $apiUriResolver;

    public function __construct(ApiUriResolver $apiUriResolver)
    {
        $this->client = new Client();
        $this->apiUriResolver = $apiUriResolver;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $uri, array $options): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->get($this->apiUriResolver->resolveUri() . $uri, $options);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $uri, array $options): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->post($this->apiUriResolver->resolveUri() . $uri, $options);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put(string $uri, array $options): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->put($this->apiUriResolver->resolveUri() . $uri, $options);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function patch(string $uri, array $options): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->patch($this->apiUriResolver->resolveUri() . $uri, $options);
    }

    public function delete(string $uri, array $options): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->delete($this->apiUriResolver->resolveUri() . $uri, $options);
    }

}